jQuery(document).ready(function ($) {
  // Journey Images
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

  // Location Images
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

  // Packages Images
  $(".select-packages-image").on("click", function (e) {
    e.preventDefault();

    const target = $(this).data("target");
    const imageInput = $("#packages-image-input-" + target);
    const imagePreview = $("#packages-image-preview-" + target);

    const frame = wp.media({
      title: "Select or Upload Image",
      button: { text: "Use this image" },
      multiple: false,
    });

    frame.on("select", function () {
      const attachment = frame.state().get("selection").first().toJSON();
      imageInput.val(attachment.id);
      imagePreview.attr("src", attachment.url).show();
    });

    frame.open();
  });

  // Map Image
  $(".select-packages-map-image").on("click", function (e) {
    e.preventDefault();

    const mapInput = $("#packages-map-image-input");
    const mapPreview = $("#packages-map-image-preview");

    const frame = wp.media({
      title: "Select or Upload Map Image",
      button: { text: "Use this image" },
      multiple: false,
    });

    frame.on("select", function () {
      const attachment = frame.state().get("selection").first().toJSON();
      mapInput.val(attachment.id);
      mapPreview.attr("src", attachment.url).show();
    });

    frame.open();
  });
});
