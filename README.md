### Backend-Developer-Case-Study

### Verileri ilgili apiden çekmek için kullanmanız gereken Command komutu (Generic bir komut oluşturdum.):
php artisan app:fetch-tasks-from-api --mock_url=mock-one --field_mapping='{"name":"<api-name-key>", "duration":"<api-duration-key>", "difficulty_level":"<api-difficulty-key>"}'

### Belirtilen apideki dataları çekebilmek için:
php artisan app:fetch-tasks-from-api --mock_url="mock-one" --field_mapping="{\"name\":\"id\", \"duration\":\"estimated_duration\", \"difficulty_level\":\"value\"}"

Parametreler:
+ --mock_url=  mock-one veya mock-two seçeneğini belirtir.
+ --field_mapping= Json daki çekilecek alanları filtrelemek için.
+ name, duration ve difficulty_level apideki çekilecek alanları belirtir.


(Null Data):
![image](https://github.com/user-attachments/assets/214dafca-48fa-4034-a01d-6550046e734b)

mock-one Command Run Success
![image](https://github.com/user-attachments/assets/5f06d475-8a82-443e-a66f-feefe6e6b156)

mock-two Command Run Success
![image](https://github.com/user-attachments/assets/776632a4-6e8b-4ff3-99c3-2c21250edc4d)

