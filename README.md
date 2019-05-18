# OCI_Keys
Code to auto generate SSH and PEM keyfiles for OCI

## Why?
I have been organizing hands-on workshop for the Oracle Cloud Infrastructure and found that people (especially windows-based users) struggle creating the right kind of key files for OCI. 

Depending on people choice of PC (putty) or Mac/Linux (ssh), people require a different format for SSH / API access to OCI.

This code you can run on a webserver and will automatically create private and public key files in both PEM (SSH/API access) and Putty SSH (Windows Users) format.

You can test it out here:
www.oci-workshop.com/keys


