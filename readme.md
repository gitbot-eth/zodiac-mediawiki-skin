## Activating the skin in a MediaWiki instance
*The skin is only tested on MediaWiki version 1.37.*
1. **Get the skin:** 
Clone this repo into the MediaWiki's `skins` directory: 
```
cd skins
git clone https://github.com/gnosis/zodiac-mediawiki-skin.git zodiac
```

2. **Activate the skin:** 
In the `LocalSettings.php` file (located at the root of the MediaWiki directory):
   1. Add `wfLoadSkin( 'zodiac' );` above the `$wgDefaultSkin` variable.
   2. Set `$wgDefaultSkin = "zodiac";`.
   

## How to activate changes during development
When developing, open the zodiac-skin directory directly (`skins/zodiac`).
Then install dependencies via `npm install`. When your changes are done, activate the changes via `npm dev`.


## Setting up a general MediaWiki development environment

1. `git clone --depth=1 https://gerrit.wikimedia.org/r/mediawiki/core.git mediawiki`
2. `cd mediawiki`
3. create the .env file with:

```
   MW_SCRIPT_PATH=/w
   MW_SERVER=http://localhost:8080
   MW_DOCKER_PORT=8080
   MEDIAWIKI_USER=Admin
   MEDIAWIKI_PASSWORD=dockerpass
   XDEBUG_CONFIG=
   XDEBUG_ENABLE=true
   XHPROF_ENABLE=true
```

4. `echo "MW_DOCKER_UID=$(id -u) MW_DOCKER_GID=$(id -g)" >> .env`
5. `docker-compose up -d`
6. `docker-compose exec mediawiki composer update`
7. `docker-compose exec mediawiki /bin/bash /docker/install.sh`
8. visit your MediaWiki at `localhost:8080`
