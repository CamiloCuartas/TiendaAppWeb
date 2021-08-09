document.addEventListener("DOMContentLoaded", function() {

    const updateInput = (selectBrand) => {
        selectBrand = selectBrand.target;
        const inputEditBrand = document.getElementById('inputEditBrand');
        const selectedValue = [...selectBrand.options]
            .find(item => selectBrand.value === item.value && item.value !== '-1');
        inputEditBrand.value = selectedValue ? selectedValue.innerText : '';
    }

    const fillTableWhitArticles = (selectBrand) => {
        console.log('prueba');
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
        const id = buttonTrash.target.closest('tr').querySelector('td.id').innerText;
        const formData = new FormData();
        formData.append('id', id);
        asyncPost({
            url: '/items/destroy',
            formData: formData
        }).then(data => {
            window.location = window.location.href
        });
    }

    const editItem = (buttonEdit) => {
        const tr = buttonEdit.target.closest('tr');
        const id = tr.querySelector('td.id').innerText;
        const name = tr.querySelector('td.name input').value;
        const size = tr.querySelector('td.size select').value;
        const observations = tr.querySelector('td.observations input').value;
        const onHand = tr.querySelector('td.onHand input').value;
        const shippingDate = tr.querySelector('td.shippingDate input').value;
        const formData = new FormData();
        formData.append('id', id);
        formData.append('name', name);
        formData.append('size', size);
        formData.append('observations', observations);
        formData.append('onHand', onHand);
        formData.append('shippingDate', shippingDate);
        asyncPost({
            url: '/items/edit',
            formData: formData
        }).then(data => {
            window.location = window.location.href
        });
    }

    const asyncPost = async (queryData) => {

        let {url,formData,method = 'POST',type = "json"} = queryData;
        const settings = {
            method: method,
            body: formData,
            headers: {
                accept: "application/json"
            }
        };

        const fetchResponse = await fetch(`${url}`, settings);
        const data = type !== 'json' ? await fetchResponse.text() : await fetchResponse.json();

        if (!fetchResponse.ok){
            throw data;
        }

        return data;
    };

    if (document.getElementById('selectBrand')) {
        document.getElementById('selectBrand')
            .addEventListener('change', updateInput);
    }

    if (document.getElementById('selectBrandToShowData')) {
        document.getElementById('selectBrandToShowData')
            .addEventListener('change', fillTableWhitArticles);
    }

    if (document.querySelector('td.delete')) {
        document.querySelectorAll('td.delete')
            .forEach(htmlElement => {
                htmlElement.addEventListener('click', deleteItem)
            });
    }

    if (document.querySelector('td.edition')) {
        document.querySelectorAll('td.edition')
            .forEach(htmlElement => {
                htmlElement.addEventListener('click', editItem)
            });
    }
});
