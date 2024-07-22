function init()
{
    fetch('../php/api.php', {
        method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify({
			code: 'dell'
		})
    })
    .then(response => response.json())
	.then(data => {
		if(data['acces'] == "granted"){
            alert('Успех!');
            window.location.href = '../index.html'
        }
		else
			alert(data['error']);
	});
}