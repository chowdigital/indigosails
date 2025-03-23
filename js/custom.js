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
