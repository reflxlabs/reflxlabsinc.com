#!/bin/bash

sculpin generate --env=prod || ( echo "Could not generate the site" && exit )
rsync -avze 'ssh -p 668' output_prod/ offloc@pond000.reflxlabsinc.com:/opt/offloc/websites/reflxlabsinc.com || ( echo "Could not publish the site" && exit )
