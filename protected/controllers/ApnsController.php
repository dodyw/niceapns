<?php
class ApnsController extends Controller
{

    /**
     * @return array action filters
     */
    public function filters()
    {
            return array();
    }
 
    // Actions
    public function actionSend()
    {	error_reporting(E_ALL);
        print "send me";
        
        // Using Autoload all classes are loaded on-demand
        // Yii::import('application.vendors.*');

        // print Yii::app()->basePath . '/../ApnsPHP/Autoload.php';
		// require_once Yii::app()->basePath . '/../ApnsPHP/Autoload.php';

		// require_once 'ApnsPHP/Autoload.php';
        // print "xx";


		// Yii::setPathOfAlias('ApnsPHP_Push',Yii::getPathOfAlias('application.vendors.ApnsPHP.Push.Push'));

		// Instanciate a new ApnsPHP_Push object
		// $push = new ApnsPHP_Push(
		// 	ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,
		// 	Yii::app()->basePath . '/../pemfiles/'.'aps_acsdemo_dev.pem'
		// );

		Yii::import('ext.SAPNS.SAPNS');
		$apns = new SAPNS;
		$apns->environment = SAPNS::ENV_SANDBOX;
		$apns->providerCertificateFilePath = Yii::app()->basePath . '/../pemfiles/'.'aps_acsdemo_dev.pem';
		$apns->rootCertificationAuthorityFilePath = Yii::app()->basePath . '/../pemfiles/'.'entrust_root_certification_authority.pem';
		$apns->init();
		// $push_server = $apns->getPushProvider()->add('helo');
		// var_dump($push_server);


// Instantiate a new Message with a single recipient
$message = new ApnsPHP_Message('2ac78d67bb906e7b1b7d7fc906819c0a0c30b7003a867a11b59406599d1e1836');

// Set a custom identifier. To get back this identifier use the getCustomIdentifier() method
// over a ApnsPHP_Message object retrieved with the getErrors() message.
$message->setCustomIdentifier("Message-Badge-3");

// Set badge icon to "3"
$message->setBadge(3);

// Set a simple welcome text
$message->setText('Hello APNs-enabled device!');

// Play the default sound
$message->setSound();

// Set a custom property
$message->setCustomProperty('acme2', array('bang', 'whiz'));

// Set another custom property
$message->setCustomProperty('acme3', array('bing', 'bong'));

// Set the expiry value to 30 seconds
$message->setExpiry(30);

// Add the message to the message queue
$apns->add($message);

// Send all messages in the message queue
$apns->send();

// Disconnect from the Apple Push Notification Service
$apns->disconnect();


/*

		// Set the Root Certificate Autority to verify the Apple remote peer
		$push->setRootCertificationAuthority(Yii::app()->basePath . '/../pemfiles/'.'entrust_root_certification_authority.pem');

		// Connect to the Apple Push Notification Service
		$push->connect();

		// Instantiate a new Message with a single recipient
		$message = new ApnsPHP_Message('2ac78d67bb906e7b1b7d7fc906819c0a0c30b7003a867a11b59406599d1e1836');

		// Set a custom identifier. To get back this identifier use the getCustomIdentifier() method
		// over a ApnsPHP_Message object retrieved with the getErrors() message.
		$message->setCustomIdentifier("Message-Badge-3");

		// Set badge icon to "3"
		$message->setBadge(3);

		// Set a simple welcome text
		$message->setText('Hello APNs-enabled device!');

		// Play the default sound
		$message->setSound();

		// Set a custom property
		$message->setCustomProperty('acme2', array('bang', 'whiz'));

		// Set another custom property
		$message->setCustomProperty('acme3', array('bing', 'bong'));

		// Set the expiry value to 30 seconds
		$message->setExpiry(30);

		// Add the message to the message queue
		$push->add($message);

		// Send all messages in the message queue
		$push->send();

		// Disconnect from the Apple Push Notification Service
		$push->disconnect();
*/
    }
}