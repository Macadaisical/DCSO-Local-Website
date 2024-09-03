(() => {
  // admin/template-kit-export-admin.js
  (function($) {
    "use strict";
    function save_template_kit_positions() {
      var posId = 0;
      $("#template-kit-sortable-container .templates").each(
        function() {
          $(this).find(".position_id").val(posId);
          posId++;
        }
      );
    }
    $(
      function() {
        var $sortableContainer = $("#template-kit-sortable-container");
        if ($sortableContainer.length > 0) {
          save_template_kit_positions();
          $sortableContainer.sortable();
          $sortableContainer.on(
            "sortstop",
            function(event, ui) {
              save_template_kit_positions();
            }
          );
        }
      }
    );
    $(document).on(
      "click",
      ".upload-image",
      function(e) {
        e.preventDefault();
        var $button = $(this);
        var $templateWrapper = $button.parents(".templates").first();
        var templateId = $templateWrapper.data("template-id");
        var file_frame = wp.media.frames.file_frame = wp.media(
          {
            title: "Select or upload image",
            library: {
              type: "image"
            },
            button: {
              text: "Select"
            },
            multiple: false
          }
        );
        file_frame.on(
          "select",
          function() {
            var uploaded_img_meta = file_frame.state().get("selection").first().toJSON();
            var thumbnail_url = "";
            var thumbnailWidth = parseInt(window.template_kit_export.thumbnail_width);
            var minimumValidThumbnailWidth = 300;
            if (!uploaded_img_meta["sizes"]["tk_preview"] || uploaded_img_meta["sizes"]["tk_preview"]["width"] < minimumValidThumbnailWidth) {
              if (uploaded_img_meta["sizes"]["full"] && uploaded_img_meta["sizes"]["full"]["width"] <= thumbnailWidth) {
                thumbnail_url = uploaded_img_meta["sizes"]["full"]["url"];
              } else {
                alert("Sorry the selected image does not have a correct thumbnail size. Please upload a new screenshot image that is at least " + thumbnailWidth + " pixels wide.");
                return;
              }
            } else {
              thumbnail_url = uploaded_img_meta["sizes"]["tk_preview"]["url"];
            }
            $("div[data-template-id=" + templateId + "]").find(".tk-preview-image-id").val(uploaded_img_meta["id"]);
            $("div[data-template-id=" + templateId + "] .screenshot").css("backgroundImage", "url( " + thumbnail_url + ")");
          }
        );
        file_frame.open();
      }
    );
  })(jQuery);
})();
//# sourceMappingURL=template-kit-export-admin.js.map
