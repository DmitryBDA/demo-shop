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
