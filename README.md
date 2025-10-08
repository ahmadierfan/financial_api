1. clone project
2. run: composer install
3. add datebase config
4. add jwt sercret key to env
    c5O0uRoe4h8fitmHNChmocNtZeUg2JYETWk1sOblVFAoEcWEUiD5xi7D0QbRMoGg

5. run: pm2 start "php artisan serve --host=0.0.0.0 --port=8000" --name "accounting_api"
6. pm2 start queue-worker.sh --name accounting-worker
7. php artisan config:cach && php artisan config:clear && php artisan route:cache && pm2 reload accounting_api
نکات:

1. قراردادن
'api' => [
    'driver' => 'jwt',
    'provider' => 'users',
],
در قسمت 
guards
در فایل auth.php
در config

2. تنظیمات دو زبانه در Localization.php 
در middlware
هستش

3. 
