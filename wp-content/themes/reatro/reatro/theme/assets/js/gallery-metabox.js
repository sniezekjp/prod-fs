jQuery(function($) {

  var file_frame;

  $(document).on('click', '#twoot-metabox-gallery a.gallery-add', function(e) {

    e.preventDefault();

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: true
    });

    file_frame.on('select', function() {
      var listIndex = $('#metabox-gallery-list li').index($('#metabox-gallery-list li:last')),
          selection = file_frame.state().get('selection');

      selection.map(function(attachment, i) {
        attachment = attachment.toJSON(),
        index      = listIndex + (i + 1);

        $('#metabox-gallery-list').append('<li><input type="hidden" name="_twoot_gallery_id[' + index + ']" value="' + attachment.id + '"><img class="image-preview" src="' + attachment.sizes.thumbnail.url + '"><a class="change-image" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">Change image</a><a class="remove-image" href="#">Remove image</a></li>');
      });
    });

    makeSortable();
    
    file_frame.open();

  });

  $(document).on('click', '#twoot-metabox-gallery a.change-image', function(e) {

    e.preventDefault();

    var that = $(this);

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: false
    });

    file_frame.on( 'select', function() {
      attachment = file_frame.state().get('selection').first().toJSON();

      that.parent().find('input:hidden').attr('value', attachment.id);
      that.parent().find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
    });

    file_frame.open();

  });

  function resetIndex() {
    $('#metabox-gallery-list li').each(function(i) {
      $(this).find('input:hidden').attr('name', '_twoot_gallery_id[' + i + ']');
    });
  }

  function makeSortable() {
    $('#metabox-gallery-list').sortable({
      opacity: 0.6,
      stop: function() {
        resetIndex();
      }
    });
  }

  $(document).on('click', '#twoot-metabox-gallery a.remove-image', function(e) {
    e.preventDefault();

    $(this).parents('li').animate({ opacity: 0 }, 200, function() {
      $(this).remove();
      resetIndex();
    });
  });

  makeSortable();

});