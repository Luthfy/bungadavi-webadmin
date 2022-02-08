function delete_ajax(id)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: window.location.href + '/' + id,
                type: 'delete',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: (result) => {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )

                    if ($('#datatablesserverside').length > 0) {
                        $('#datatablesserverside').DataTable().ajax.reload();
                    } else {
                        window.location.reload()
                    }
                },
            })


        }
    })
}

function getProvincesAjax(urlAbsolute, id = '')
{
    $.ajax({
        url : urlAbsolute,
        type : 'get',
        success: (result) => {
            let html = "";
                html += "<option value='' disabled readonly selected>- Select Province -</option>";
            result.forEach((res) => {
                var selected = (id == res.id) ? 'selected' : '';
                html += "<option value='"+res.id+"' "+ selected + ">"+res.name+"</option>";
            })
            $("#province-id").html(html);
        }
    })
}

function getCountriesAjax(urlAbsolute, id = '')
{
    $.ajax({
        url : urlAbsolute,
        type : 'get',
        success: (result) => {
            let html = "";
                html += "<option value='' disabled readonly selected>- Select Country -</option>";
            result.forEach((res) => {
                var selected = (id == res.id) ? 'selected' : '';
                html += "<option value='"+res.id+"' "+ selected + ">"+res.name+"</option>";

            })
            $("#country-id").html(html);
        }
    })
}

function getCitiesAjax(urlAbsolute, id = '')
{
    $.ajax({
        url : urlAbsolute,
        type : 'get',
        success: (result) => {
            let html = "";
                html += "<option value='' disabled readonly selected>- Select City -</option>";
            result.forEach((res) => {
                var selected = (id == res.id) ? 'selected' : '';
                html += "<option value='"+res.id+"' "+ selected + ">"+res.name+"</option>";
            })
            $("#city-id").html(html);
        }
    })
}

function getDistrictsAjax(urlAbsolute, id = '')
{
    $.ajax({
        url : urlAbsolute,
        type : 'get',
        success: (result) => {
            let html = "";
                html += "<option value='' disabled readonly selected>- Select District -</option>";
            result.forEach((res) => {
                var selected = (id == res.id) ? 'selected' : '';
                html += "<option value='"+res.id+"' "+ selected + ">"+res.name+"</option>";
            })
            $("#district-id").html(html);
        }
    })
}

function getZipCodesAjax(urlAbsolute, id = '')
{
    $.ajax({
        url : urlAbsolute,
        type : 'get',
        success: (result) => {
            let html = "";
                html += "<option value='' disabled readonly selected>- Select Zip Code -</option>";
            result.forEach((res) => {
                var selected = (id == res.id) ? 'selected' : '';
                html += "<option value='"+res.id+"' "+ selected + ">"+res.postal_code+"</option>";
            })
            $("#zipcode-id").html(html);
        }
    })
}


function getVillagesAjax(urlAbsolute, id = '')
{
    $.ajax({
        url : urlAbsolute,
        type : 'get',
        success: (result) => {
            let html = "";
                html += "<option value='' disabled readonly selected>- Select Village -</option>";
            result.forEach((res) => {
                var selected = (id == res.id) ? 'selected' : '';
                html += "<option value='"+res.id+"' "+ selected + ">"+res.name+"</option>";
            })
            $("#village-id").append(html);
        }
    })
}

function getStocksAjax(urlAbsolute)
{
    $.ajax({
        url : urlAbsolute,
        type : 'get',
        success: (result) => {
            let html = "";
                html += "<option value='' disabled readonly selected>- Select Stocks -</option>";
            result.forEach((res) => {
                html += "<option value='"+res.uuid+"'>"+res.name_stock+"</option>";
            })
            $("#socks-uuid").append(html);
        }
    })
}

function getCategoriesAjax(urlAbsolute)
{
    $.ajax({
        url : urlAbsolute,
        type : 'get',
        success: (result) => {
            let html = "";
                html += "<option value='' disabled readonly selected>- Select Categories -</option>";
            result.forEach((res) => {
                html += "<option value='"+res.id+"'>"+res.name+"</option>";
            })
            $("#categories-id").html(html);
        }
    })
}

function getSubCategoriesAjax(urlAbsolute)
{
    $.ajax({
        url : urlAbsolute,
        type : 'get',
        success: (result) => {
            let html = "";
                html += "<option value='' disabled readonly selected>- Select Sub Categories -</option>";
            result.forEach((res) => {
                html += "<option value='"+res.id+"'>"+res.name+"</option>";
            })
            $("#subcategories-id").html(html);
        }
    })
}


