# Build
FROM node:lts-alpine
WORKDIR /usr/src/app
COPY . .
RUN yarn install
RUN yarn build

# Deploy
FROM httpd:alpine

WORKDIR /usr/src/app
RUN ls /usr/local/apache2/htdocs/
COPY --from=0 /usr/src/app/dist/ /usr/local/apache2/htdocs/