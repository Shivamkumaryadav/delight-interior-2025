<?php

exec('/bin/bash /home/master/applications/delight_interior/public_html/deployment_hook.sh > /dev/null 2>&1 &');

echo "Deployment triggered";
