<?php

// Create SSH keys in both SSH and PEM format. 
//

include('Crypt/RSA.php');
require 'vendor/autoload.php';

$opt = array(
                'comment' => 'SSH Key files.',
                'content_type' => 'application/octet-stream'
	);

$rsa = new Crypt_RSA();
extract($rsa->createKey(2048));
$rsa->loadKey($privatekey);
$SSHprivatekey = $rsa->getPrivateKey(CRYPT_RSA_PRIVATE_FORMAT_PUTTY);
$SSHpublickey = $rsa->getPublicKey(CRYPT_RSA_PUBLIC_FORMAT_OPENSSH);

$zip = new ZipStream\ZipStream('OCI_Keys.zip', $opt);

$info = "These are unique generated SSH key files. These files were created in memory only and saved to your local machine. Please save these files carefully, they can not be downloaded again!";

$zip->addFile("OpenSSH-and-API_private.pem", "$privatekey");
$zip->addFile("OpenSSH-and-API_public.pem", "$publickey");
$zip->addFile("PuttySSH_private.ppk", "$SSHprivatekey");
$zip->addFile("PuttySSH_public.pub", "$SSHpublickey");
$zip->addFile("readme.txt", "$info");

$zip->finish();


?>
