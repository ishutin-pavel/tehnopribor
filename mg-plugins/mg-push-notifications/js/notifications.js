
if (window.location.protocol === 'https:' &&
    'Notification' in window &&
    'serviceWorker' in navigator &&
    'localStorage' in window &&
    'fetch' in window &&
    'postMessage' in window
) {
    var messaging = firebase.messaging();
	
	getToken();
	
    // handle catch the notification on current page
    messaging.onMessage(function(payload) {
        console.log('Message received. ', payload);     
		navigator.serviceWorker.register(mgBaseDir+'/messaging-sw.js');
		
        Notification.requestPermission(function(permission) {

            if (permission === 'granted') {
                navigator.serviceWorker.ready.then(function(registration) {
					console.log('permission ', permission);
                    payload.notification.data = payload.notification;
					console.log('payload.notification.title ', payload.notification.title);
					console.log('payload.notification ', payload.notification);
                    registration.showNotification(payload.notification.title, payload.notification);
                }).catch(function(error) {			
                    // registration failed :(
                    showError('ServiceWorker registration failed.', error);
                });
            }
        });
    });

    // Callback fired if Instance ID token is updated.
    messaging.onTokenRefresh(function() {
        messaging.getToken()
            .then(function(refreshedToken) {
                console.log('Token refreshed.');
                // Send Instance ID token to app server.
                sendTokenToServer(refreshedToken);
               // updateUIForPushEnabled(refreshedToken);
            })
            .catch(function(error) {
                showError('Unable to retrieve refreshed token.', error);
            });
    });

} else {
    console.warn('This browser does not support desktop notification.');
    console.log('Is HTTPS', window.location.protocol === 'https:');
    console.log('Support Notification', 'Notification' in window);
    console.log('Support ServiceWorker', 'serviceWorker' in navigator);
    console.log('Support LocalStorage', 'localStorage' in window);
    console.log('Support fetch', 'fetch' in window);
    console.log('Support postMessage', 'postMessage' in window);
}


function getToken() {
    messaging.requestPermission()
        .then(function() {
            // Get Instance ID token. Initially this makes a network call, once retrieved
            // subsequent calls to getToken will return from cache.
            messaging.getToken()
                .then(function(currentToken) {

                    if (currentToken) {
					 console.log(currentToken);
                        sendTokenToServer(currentToken);
                       // updateUIForPushEnabled(currentToken);
						
                    } else {
                        showError('No Instance ID token available. Request permission to generate one.');
                        //updateUIForPushPermissionRequired();
                        setTokenSentToServer(false);
                    }
                })
                .catch(function(error) {
                    showError('An error occurred while retrieving token.', error);
                    //updateUIForPushPermissionRequired();
                    setTokenSentToServer(false);
                });
        })
        .catch(function(error) {
            showError('Unable to get permission to notify.', error);
        });
}


// Send the Instance ID token your application server, so that it can:
// - send messages back to this app
// - subscribe/unsubscribe the token from topics
function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer(currentToken)) {
        console.log('Sending token to server...');
		saveTokenID(currentToken);
        setTokenSentToServer(currentToken);
    } else {
        console.log('Token already sent to server so won\'t send it again unless it changes');
    }
}

function isTokenSentToServer(currentToken) {
    return window.localStorage.getItem('sentFirebaseMessagingToken') == currentToken;
}

function setTokenSentToServer(currentToken) {
    if (currentToken) {
        window.localStorage.setItem('sentFirebaseMessagingToken', currentToken);
    } else {
        window.localStorage.removeItem('sentFirebaseMessagingToken');
    }
}

function showError(error, error_data) {
    if (typeof error_data !== "undefined") {
        console.error(error + ' ', error_data);
    } else {
        console.error(error);
    }
}

function saveTokenID(currentToken) {

   // console.log('saveTokenID:'+currentToken);  
	//return true;
	
	/*
	fetch('https://willi24.ru/sw/callback.php', {  
	method: 'post',  
	headers: { 	
	  "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
	},  
	 body: 'token='+currentToken 
   }).then(function (data) {  
	 console.log('Request succeeded with JSON response', data);  
   })  
   .catch(function (error) {  
	console.log('Request failed', error);  
  });
  */
  
  
    $.ajax({
      type: "POST",
      url: mgBaseDir + "/ajaxrequest",
      dataType: 'json',
      data: {
        mguniqueurl: "action/addToken", // действия для выполнения на сервере
        pluginHandler: 'mg-push-notifications',
        tokenid: currentToken,   
      },
      success: function(response) {
       console.log(response);  
      }
    });
  
  
  
  
  
}

