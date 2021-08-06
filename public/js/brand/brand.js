document.addEventListener("DOMContentLoaded", function() {

    const updateInput = (selectBrand) => {
        selectBrand = selectBrand.target;
        const inputEditBrand = document.getElementById('inputEditBrand');
        const selectedValue = [...selectBrand.options]
            .find(item => selectBrand.value === item.value && item.value !== '-1');
        inputEditBrand.value = selectedValue ? selectedValue.innerText : '';
    }

    const fillTableWhitArticles = (selectBrand) => {
        const rowsTable = [...document.querySelectorAll('table tbody tr')];
        showAllRows(rowsTable);
        if (selectBrand.target.value !== '-1') {
            rowsTable.map(row => {
                    if (row.querySelector('.providerId').innerText !== selectBrand.target.value) {
                        row.classList.add('d-none');
                    }
                }
            )
        }
    }

    const showAllRows = (rows) => {
        rows.map(row => {
            row.classList.remove('d-none');
        })
    }

    const deleteItem = async (buttonTrash) => {
        // const url = '/items/destroy'
        const formData = new FormData();
        formData.append('id', '1');
        // const settings = {
        //     method: 'POST',
        //     body: formData,
        //     headers: {
        //         accept: "application/json",
        //         "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
        //     }
        // };
        // const fetchResponse = await fetch(`${url}`, settings);
        // console.log(fetchResponse.json());

        asyncPost({
            url: '/items/destroy',
            formData: formData,
        }).then(data => {console.log(data)});
    }

    const asyncPost = async (queryData) => {

        let {url,formData,method = 'POST',type = "json",isApi = false} = queryData;
        const settings = {
            method: method,
            body: formData,
            headers: {
                accept: "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        };

        if (isApi) {
            settings.headers.Authorization = apiToken;
        }

        const fetchResponse = await fetch(`${url}`, settings);
        const data = type !== 'json' ? await fetchResponse.text() : await fetchResponse.json();

        if (!fetchResponse.ok){
            return await Promise.reject(data)
        }

        return data;
    };
    // // Ejemplo implementando el metodo POST:
    // async function postData(url = '', data = {}) {
    //     // Opciones por defecto estan marcadas con un *
    //     const response = await fetch(url, {
    //         method: 'POST', // *GET, POST, PUT, DELETE, etc.
    //         mode: 'cors', // no-cors, *cors, same-origin
    //         cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
    //         credentials: 'same-origin', // include, *same-origin, omit
    //         headers: {
    //             'Content-Type': 'application/json'
    //             // 'Content-Type': 'application/x-www-form-urlencoded',
    //         },
    //         redirect: 'follow', // manual, *follow, error
    //         referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    //         body: JSON.stringify(data) // body data type must match "Content-Type" header
    //     });
    //     return response.json(); // parses JSON response into native JavaScript objects
    // }

    // postData('/items/destroy', { answer: 42 })
    //     .then(data => {
    //         console.log(data); // JSON data parsed by `data.json()` call
    //     });

    if (document.getElementById('selectBrand')) {
        document.getElementById('selectBrand').addEventListener('change', updateInput);
    }

    if (document.getElementById('selectBrandToShowData')) {
        document.getElementById('selectBrandToShowData').addEventListener('change', fillTableWhitArticles);
    }

    if (document.querySelector('td.delete')) {
        document.querySelectorAll('td.delete')
            .forEach(htmlElement => {
                htmlElement.addEventListener('click', deleteItem)
            });
    }
});
