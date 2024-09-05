# This is a guide for using the wakeonlan api
This project includes actually just the api to call the wakeonlan on a 
specific pc within the same network as the pc running this api.

### Installation guide
The installation is really fast and easy. Just use the following commands:
1. ```bash
   cp .env.dist .env
   ```
   
2. ```bash
   composer install
   ```
   
3. ```bash
   composer test:behavior:run
   ```

### How to call the api?
To call the api just run the uri */network/lan/wake*. Also there is a command
which can be used just call it like this:
```bash
bin/console network:lan:wake <mac> <broadcast>
```
Also if you want to call the url directly you can use curl:
```bash
curl --header "Content-Type: application/json" \
  --request POST \
  --data '{"mac":"00:00:00:00:00","broadcast":"192.168.177.255"}' \
  http://localhost:3000/network/lan/wake
```