#!/bin/bash

sculpin generate --env=prod || ( echo "Could not generate the site" && exit )
rsync -avze 'ssh -p 668' output_prod/ reflxlabs@pond000.reflxlabsinc.com:/opt/reflxlabs/websites/reflxlabsinc.com || ( echo "Could not publish the site" && exit )
