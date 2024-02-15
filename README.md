# Api address

## Install
Install composer
```
composer install
```
Generate key
```
php artisan key:generate
```
Run migrations
```
php artisan migrate
```

## Full api
```
demo.test/address/{parentId?}/{depth?}/{countryCode?}
```

## Get provinces(vn)
```
demo.test/api/address
```

## Get districts in province (vn)
```
demo.test/api/address/{idProvince}/1
```
## Get wards in district (vn)
```
demo.test/api/address/{idDistrict}/2
```
