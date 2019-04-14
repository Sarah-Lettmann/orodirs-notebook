# Setup Vagrant
In a console, go into the vagrant folder and do a _vagrant up_. The vagrant now provisions itself by downloading the machine and setting everything up.

After he is finished, you can do a _vagrant ssh_ to check if the machine is running. If everything is fine, than end the ssh session with _logout_.

# Use vagrant
The vagrant is available under http://localhost:8080/.

By _ssh_ into the vagrant you can find the files of your project under _/var/www/orodirs-notebook_

# Changes
If you change something regarding the configuration of the vagrant, then do a _vagrant reload --provision_ to force the vagrant to run with the newest configuration.
