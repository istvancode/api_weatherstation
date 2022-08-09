# api_weatherstation
If you send GET weaterstation you will get back the api table records in json;
If you send POST weatherstation with json what includes (datum, hofok, para, token) you push into the api a new record (required auth);
if you send POST users=login with json what includs (email, password, token) and this datas in the api_users than you signed in;
if you SEBD GET users=login yout will get back all of the users in json;



Tables of weatherstation
table name: api_user
column: ID  email  password  token
table name: api
column: ID  datum  hofok  para  token
// datum = date
// hofok = temperature
// para = humidity
// token = optional
