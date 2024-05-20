#!/bin/sh
#keys_directory="keys"

for key in keys/*.pem; do
    echo "Processing key file: $key"
    ./wannacry -encrypted_file ./flag -key_file "$key" > "$key.decrypted"
done