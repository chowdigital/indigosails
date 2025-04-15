jQuery(document).ready(function ($) {
  $(".select-journey-image").on("click", function (e) {
    e.preventDefault();

    const target = $(this).data("target");
    const imageInput = $("#journey-image-input-" + target);
    const imagePreview = $("#journey-image-preview-" + target);

    const frame = wp.media({
      title: "Select or Upload Image",
      button: { text: "Use this image" },
      multiple: false,
    });

    frame.on("select", function () {
      const attachment = frame.state().get("selection").first().toJSON();
      imageInput.val(attachment.id);
      imagePreview.attr("src", attachment.url);
    });

    frame.open();
  });
});

// Location Images

jQuery(document).ready(function ($) {
  $(".select-location-image").on("click", function (e) {
    e.preventDefault();
    const target = $(this).data("target");
    const frame = wp.media({
      title: "Select or Upload Image",
      button: { text: "Use this image" },
      multiple: false,
    });

    frame.on("select", function () {
      const attachment = frame.state().get("selection").first().toJSON();
      $(`#location-image-preview-${target}`).attr("src", attachment.url).show();
      $(`#location-image-input-${target}`).val(attachment.id);
    });

    frame.open();
  });
});

// PACKAGE IMAGES

jQuery(document).ready(function ($) {
  $(".package-day-image-upload").on("click", function (e) {
    e.preventDefault();

    const button = $(this);
    const targetField = $("#" + button.data("target"));

    // Open the WordPress media uploader
    const mediaUploader = wp.media({
      title: "Select Image",
      button: {
        text: "Use this image",
      },
      multiple: false,
    });

    mediaUploader.on("select", function () {
      const attachment = mediaUploader
        .state()
        .get("selection")
        .first()
        .toJSON();
      targetField.val(attachment.id); // Save the attachment ID
      button.next(".package-day-image-preview").remove(); // Remove existing preview
      button.after(
        '<div class="package-day-image-preview" style="margin-top: 10px;"><img src="' +
          attachment.url +
          '" style="max-width: 100%; height: auto;"></div>'
      );
    });

    mediaUploader.open();
  });
});
