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
