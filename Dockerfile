#
# matthewlavine.net dockerfile
#


# Pull base image
FROM nginx
MAINTAINER Matthew Lavine <matt@matthewlavine.net>

COPY public /usr/share/nginx/html