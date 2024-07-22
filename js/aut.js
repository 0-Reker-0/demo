function test()
{
    let name = document.getElementById('name').value;
    let pass = document.getElementById('pass').value;

    if(name == null){
        alert('Имя пользователя должно быть заполнено!');
        return;
    }
    if(pass == null){
        alert('Пароль пользователя должен быть заполнен!');
        return;
    }

    auth(name, pass);
}

function auth(name, pass)
{
    fetch('../php/api.php', {
        method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify({
			code: 'auth',
            name: name,
            pass: pass
		})
    })
    .then(response => response.json())
	.then(data => {
		if(data['acces'] == "granted")
            set_val(data['data']);
		else
			alert(data['error']);
	});
}

function set_val(data)
{
    let d1 = document.getElementById('data_1');
    let d2 = document.getElementById('data_2');
    let d3 = document.getElementById('data_3');
    document.getElementById('hidden').style.display = "block";
    document.getElementById('data').style.display = "none";
    d1.innerHTML = data[0];
    d2.innerHTML = data[1];
    d3.innerHTML = data[2];
}