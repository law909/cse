(() => {
    document.addEventListener('DOMContentLoaded', (event) => {

        document.getElementById('searchbutton').addEventListener('click', (event) => {

            let kulcsszoValue = document.getElementById('kulcsszoinput').value;
            const formdata = new FormData();
            formdata.append('kulcsszo', kulcsszoValue);

            fetch('search', {
                method: 'POST',
                body: formdata,
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('resultDiv').innerHTML = data;
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        })
    });
})();