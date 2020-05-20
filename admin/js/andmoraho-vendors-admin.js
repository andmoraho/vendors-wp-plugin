var $ = jQuery.noConflict()
$(document).ready(function() {
  // TODO: cuando la página cargue, arreglar esconder o mostrar rooms o hours
  var service_type_charge = $('#service_type_charge').val()
  if (service_type_charge == 'rooms' || service_type_charge == 'sqft') {
    $('#_andmoraho_cleaning_service_base-price-1').hide()
    $('#_andmoraho_cleaning_service_rooms-price-2').show()
  }
  if (service_type_charge == 'hours') {
    $('#_andmoraho_cleaning_service_base-price-1').show()
    $('#_andmoraho_cleaning_service_rooms-price-2').hide()
  }

  /////////////////// Type of Charge ///////////////////////////
  $('#service_type_charge').on('change', function() {
    var type_charge = $('#service_type_charge').val()
    if (type_charge == 'rooms' || type_charge == 'sqft') {
      $('#_andmoraho_cleaning_service_base-price-1').hide()
      $('#_andmoraho_cleaning_service_rooms-price-2').show()
    }
    if (type_charge == 'hours') {
      $('#_andmoraho_cleaning_service_base-price-1').show()
      $('#_andmoraho_cleaning_service_rooms-price-2').hide()
    }
  })
  ///////////// Checklist //////////////////////////////////////
  var frame
  $('#upload_checklist_button').on('click', function(e) {
    e.preventDefault()

    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload File',
      button: {
        text: 'Use this File'
      },
      library: {
        type: 'application/pdf' // limits the frame to show only pdf
      },
      multiple: false // Set to true to allow multiple files to be selected
    })

    // When an image is selected in the media frame...
    frame.on('select', function() {
      // Get media attachment details from the frame state
      var attachment = frame
        .state()
        .get('selection')
        .first()
        .toJSON()

      // Split atthachment.url to remove baseurl
      var upload_path_of_file = attachment.url.split('/uploads/')[1]

      // Send the attachment id to our input field
      $('#checklist_file').val(upload_path_of_file)
      $('#checklist_file_name').html(attachment.filename)
    })
    frame.open()
  })

  ///////////// Rooms Metaboxes /////////////////////
  // Weekly
  $('#addweeklyrm').on('click', function() {
    var curr_count = $('#countweeklyrmdata').val()
    var count = parseInt(curr_count) + 1
    var next_count = parseInt(count) + 1
    var next_amnt_room = parseInt(curr_count) + 4

    var html = ''

    html =
      '<table><tr><td><label for="service_weekly_amnt_rooms' +
      count +
      '">Rooms:</label>&nbsp;<input type="number" name="service_weekly_amnt_rooms' +
      count +
      '" id="service_weekly_amnt_rooms' +
      count +
      '" value="' +
      parseInt(next_amnt_room) +
      '" /></td><td><label for="service_weekly_sqft' +
      count +
      '">SQFT:</label>&nbsp;<input type="number" name="service_weekly_sqft' +
      count +
      '" id="service_weekly_sqft' +
      count +
      '" value="1000" /></td><td><label for="service_weekly_price' +
      count +
      '">Price:</label>&nbsp;<input type="text" name="service_weekly_price' +
      count +
      '" id="service_weekly_price' +
      count +
      '" value="0.00" /></td></tr></table>'

    $('#countweeklyrmdata').val(count)
    $('#rooms_weekly' + count + '').html(html)
    $('<div id="rooms_weekly' + next_count + '"></div>').insertAfter(
      '#rooms_weekly' + count
    )
  })

  $('#remweeklyrm').on('click', function() {
    var curr_count = $('#countweeklyrmdata').val()
    if (curr_count > 1) {
      curr_count == 2
        ? $('#rooms_weekly' + curr_count + '').html('')
        : $('#rooms_weekly' + curr_count + '').remove()
      var count = parseInt(curr_count) - 1
      var next_count = parseInt(curr_count) + 1
      $('#countweeklyrmdata').val(count)
      var html = ''
    } else {
      var html =
        '<div><label><span style="color:ff0000;">Not allowed!</span></label></div>'
      $('#rooms_weekly2').html(html)
    }
  })
  // Biweekly
  $('#addbiweeklyrm').on('click', function() {
    var curr_count = $('#countbiweeklyrmdata').val()
    var count = parseInt(curr_count) + 1
    var next_count = parseInt(count) + 1
    var next_amnt_room = parseInt(curr_count) + 4

    var html = ''

    html =
      '<table><tr><td><label for="service_biweekly_amnt_rooms' +
      count +
      '">Rooms: </label>&nbsp;<input type="number" name="service_biweekly_amnt_rooms' +
      count +
      '" id="service_biweekly_amnt_rooms' +
      count +
      '" value="' +
      parseInt(next_amnt_room) +
      '" /></td><td><label for="service_biweekly_sqft' +
      count +
      '">SQFT:</label>&nbsp;<input type="number" name="service_biweekly_sqft' +
      count +
      '" id="service_biweekly_sqft' +
      count +
      '" value="1000" /></td><td><label for="service_biweekly_price' +
      count +
      '">Price:</label>&nbsp;<input type="text" name="service_biweekly_price' +
      count +
      '" id="service_biweekly_price' +
      count +
      '" value="0.00" /></td></tr></table>'

    $('#countbiweeklyrmdata').val(count)
    $('#rooms_biweekly' + count + '').html(html)
    $('<div id="rooms_biweekly' + next_count + '"></div>').insertAfter(
      '#rooms_biweekly' + count
    )
  })

  $('#rembiweeklyrm').on('click', function() {
    var curr_count = $('#countbiweeklyrmdata').val()
    if (curr_count > 1) {
      curr_count == 2
        ? $('#rooms_biweekly' + curr_count + '').html('')
        : $('#rooms_biweekly' + curr_count + '').remove()
      var count = parseInt(curr_count) - 1
      var next_count = parseInt(curr_count) + 1
      $('#countbiweeklyrmdata').val(count)
      var html = ''
    } else {
      var html =
        '<div><label><span style="color:ff0000;">Not allowed!</span></label></div>'
      $('#rooms_biweekly2').html(html)
    }
  })
  // Monthly
  $('#addmonthlyrm').on('click', function() {
    var curr_count = $('#countmonthlyrmdata').val()
    var count = parseInt(curr_count) + 1
    var next_count = parseInt(count) + 1
    var next_amnt_room = parseInt(curr_count) + 4

    var html = ''

    html =
      '<table><tr><td><label for="service_monthly_amnt_rooms' +
      count +
      '">Rooms:</label>&nbsp;<input type="number" name="service_monthly_amnt_rooms' +
      count +
      '" id="service_monthly_amnt_rooms' +
      count +
      '" value="' +
      parseInt(next_amnt_room) +
      '" /></td><td><label for="service_monthly_sqft' +
      count +
      '">SQFT:</label>&nbsp;<input type="number" name="service_monthly_sqft' +
      count +
      '" id="service_monthly_sqft' +
      count +
      '" value="1000" /></td><td><label for="service_monthly_price' +
      count +
      '">Price:</label>&nbsp;<input type="text" name="service_monthly_price' +
      count +
      '" id="service_monthly_price' +
      count +
      '" value="0.00" /></td></tr></table>'

    $('#countmonthlyrmdata').val(count)
    $('#rooms_monthly' + count + '').html(html)
    $('<div id="rooms_monthly' + next_count + '"></div>').insertAfter(
      '#rooms_monthly' + count
    )
  })

  $('#remmonthlyrm').on('click', function() {
    var curr_count = $('#countmonthlyrmdata').val()
    if (curr_count > 1) {
      curr_count == 2
        ? $('#rooms_monthly' + curr_count + '').html('')
        : $('#rooms_monthly' + curr_count + '').remove()
      var count = parseInt(curr_count) - 1
      var next_count = parseInt(curr_count) + 1
      $('#countmonthlyrmdata').val(count)
      var html = ''
    } else {
      var html =
        '<div><label><span style="color:ff0000;">Not allowed!</span></label></div>'
      $('#rooms_monthly2').html(html)
    }
  })
  // One time
  $('#addonetimerm').on('click', function() {
    var curr_count = $('#countonetimermdata').val()
    var count = parseInt(curr_count) + 1
    var next_count = parseInt(count) + 1
    var next_amnt_room = parseInt(curr_count) + 4

    var html = ''

    html =
      '<table><tr><td><label for="service_onetime_amnt_rooms' +
      count +
      '">Rooms:</label>&nbsp;<input type="number" name="service_onetime_amnt_rooms' +
      count +
      '" id="service_onetime_amnt_rooms' +
      count +
      '" value="' +
      parseInt(next_amnt_room) +
      '" /></td><td><label for="service_onetime_sqft' +
      count +
      '">SQFT:</label>&nbsp;<input type="number" name="service_onetime_sqft' +
      count +
      '" id="service_onetime_sqft' +
      count +
      '" value="1000" /></td><td><label for="service_onetime_price' +
      count +
      '">Price:</label>&nbsp;<input type="text" name="service_onetime_price' +
      count +
      '" id="service_onetime_price' +
      count +
      '" value="0.00" /></td></tr></table>'

    $('#countonetimermdata').val(count)
    $('#rooms_onetime' + count + '').html(html)
    $('<div id="rooms_onetime' + next_count + '"></div>').insertAfter(
      '#rooms_onetime' + count
    )
  })

  $('#remonetimerm').on('click', function() {
    var curr_count = $('#countonetimermdata').val()
    if (curr_count > 1) {
      curr_count == 2
        ? $('#rooms_onetime' + curr_count + '').html('')
        : $('#rooms_onetime' + curr_count + '').remove()
      var count = parseInt(curr_count) - 1
      var next_count = parseInt(curr_count) + 1
      $('#countonetimermdata').val(count)
      var html = ''
    } else {
      var html =
        '<div><label><span style="color:ff0000;">Not allowed!</span></label></div>'
      $('#rooms_onetime2').html(html)
    }
  })
})
