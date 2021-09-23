/*import iconClickHandler from './icon';
import svg4everybody from 'svg4everybody';*/

$('._input_search').on("input", (elem) => {
  let searchFields = $(elem.target).val();
  const url = new URL(window.location);
  let page = url.searchParams.delete('page');
  let sortField = url.searchParams.get('sortField');

  $.ajax({
    url: "/admin/products",
    type: "GET",
    data: {
      searchFields: searchFields,
      sortField: sortField,
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: (data) => {

        $('._ajax_product_list').html(data)

        url.searchParams.set('searchFields', searchFields);
        history.pushState(null, null, url);
    }
  })
});
$(document).on('click', '.sorting', (elem) => {
  let sortField = $(elem.target).attr('data-sorting').trim();
  const url = new URL(window.location);
  let searchFields = url.searchParams.get('searchFields');
  let page = url.searchParams.get('page');

  $.ajax({
    url: "/admin/products",
    type: "GET",
    data: {
      sortField: sortField,
      searchFields: searchFields,
      page: page,
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: (data) => {

      $('._ajax_product_list').html(data)
      url.searchParams.set('sortField', sortField);
      history.pushState(null, null, url);
    }
  })
});

$(document).on('click', '.add_to_cart_button', function(e) {
  e.preventDefault()
  let product_id = $(this).attr('data-product-id'),
      product_name = $(this).attr('data-product-name'),
      product_price = $(this).attr('data-product-price'),
      product_image = $(this).attr('data-product-image'),
      product_quantity = $(this).attr('data-product-quantity');

  $.ajax({
    url: "/cart",
    type: "POST",
    data: {
      id: product_id,
      name: product_name,
      price: product_price,
      image: product_image,
      quantity: product_quantity,
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: (data) => {
      $('._info_cart_wrapper').html(data)
    }
  })
});
