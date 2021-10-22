/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./src/admin/js/main.js ***!
  \******************************/
(function ($) {
  "use strict";

  var rtApp = {
    /**
     * Meta tab
     * @since 1.0.0
     * @return {mixed} 
     */
    metaTab: function metaTab() {
      $(".exdda-tab-nav li").on('click', 'a', function (e) {
        e.preventDefault();
        var $this = $(this),
            container = $this.parents('.exdda-tab-container'),
            nav = container.children('.exdda-tab-nav'),
            content = container.children(".exdda-tab-content"),
            $id = $this.attr('href');

        switch ($id) {
          case '#sc-review':
            $('#_exdda_sc_tab').val('review');
            break;

          case '#sc-schema':
            $('#_exdda_sc_tab').val('schema');
            break;

          case '#sc-settings':
            $('#_exdda_sc_tab').val('setting');
            break;

          case '#sc-affiliate':
            $('#_exdda_sc_tab').val('affiliate');
            break;

          case '#sc-style':
            $('#_exdda_sc_tab').val('style');
            break;

          case '#sc-preview':
            $('#_exdda_sc_tab').val('preview');
            break;
        }

        content.hide();
        nav.find('li').removeClass('active');
        $this.parent().addClass('active');
        container.find($id).show();
      }); // auto check tab by radio support

      $(document).on('change', '#exdda-support input[type=radio]', function () {
        var exdda_support = $("#exdda-support input[name='exdda_support']:checked").val();

        switch (exdda_support) {
          case 'review':
          case 'dda':
            //save meta
            $('#_exdda_sc_tab').val('review'); //show tab and content

            $('.exdda-tab-nav').find('li').removeClass('active');
            $('.exdda-tab-nav').find('li.review-tab').addClass('active');
            $('.exdda-tab-container .exdda-tab-content').hide();
            $('#sc-review').show();
            break;

          case 'schema':
            //save meta
            $('#_exdda_sc_tab').val('schema'); //show tab and content

            $('.exdda-tab-nav').find('li').removeClass('active');
            $('.exdda-tab-nav').find('li.schema-tab').addClass('active');
            $('.exdda-tab-container .exdda-tab-content').hide();
            $('#sc-schema').show();
            break;
        }
      });
    },

    /**
           * Alert box
           * @since 1.0.0
           * @return {mixed} 
           */
    alertBox: function alertBox() {
      //radio_image pro alert
      $('.exdda-radio-image input[type="radio"]').on('click', function () {
        if (!exdda.pro && $(this).data('pro') == 'yes') {
          $('.exdda-pro-alert').show();
          $('.exdda-pro-alert p span').html('');
          return false;
        }
      }); //pagination_type pro alert

      $("#exdda-pagination_type").on('change', function (e) {
        var pagination_type = $("#exdda-pagination_type option:selected").text();

        if (pagination_type.indexOf("[Pro]") >= 0) {
          if (!exdda.pro) {
            $('#exdda-pagination_type').val("number").select2();
            $('.exdda-pro-alert').show();
            return false;
          }
        }
      }); //schema_type pro alert

      $("#exdda-rich_snippet_cat_back").on('change', function (e) {
        var pagination_type = $("#exdda-rich_snippet_cat_back option:selected").text();

        if (pagination_type.indexOf("[Pro]") >= 0) {
          if (!exdda.pro) {
            $('#exdda-rich_snippet_cat_back').val("article").select2();
            $('.exdda-pro-alert').show();
            return false;
          }
        }
      });
      $("#exdda_meta").on('click', '.pro-field', function (e) {
        e.preventDefault();
        $('.exdda-pro-alert').show();
      }); //pro alert close

      $('.exdda-pro-alert-close').on('click', function (e) {
        e.preventDefault();
        $('.exdda-pro-alert').hide();
      }); //already exist alert close

      $('.exdda-post-type-close').on('click', function (e) {
        e.preventDefault();
        $('.exdda-post-type').hide();
      });
    },

    /**
           * Library support
           * @since 1.0.0
           * @return {mixed} 
           */
    libSupport: function libSupport() {
      //support select2 js
      if ($(".exdda-select2").length && $.fn.select2) {
        $(".exdda-select2").select2({
          dropdownAutoWidth: true
        });
      } //color picker


      if ($.fn.wpColorPicker) {
        $('.rt-color').wpColorPicker();
      }
    },

    /**
     * Schema data auto fill
     * @since 1.0.0
     * @return {mixed} 
     */
    autoFillSchema: function autoFillSchema() {
      function auto_fill_ajax(snippet_cat, post_id) {
        $.ajax({
          type: "POST",
          dataType: "json",
          url: exdda.ajaxurl,
          data: {
            action: 'exdda_auto_fill_schema',
            post_id: post_id,
            snippet_cat: snippet_cat
          },
          success: function success(resp) {
            if (resp.success) {
              var data = resp.data;

              if (data.hasOwnProperty('category')) {
                snippet_cat = data.category;
              }

              switch (snippet_cat) {
                case 'article':
                case 'news_article':
                case 'blog_posting':
                  $('#exdda-rich_snippet_cat').val([snippet_cat]);
                  $('#exdda-rich_snippet_cat').trigger('change');

                  for (var key in data) {
                    if (key == 'image' || key == 'publisherImage') {
                      $('#exdda_' + snippet_cat + '_schema_holder #exdda_' + snippet_cat + '_schema_0__' + key + '_').find('.exdda-preview-imgs').html("<div class='exdda-preview-img'><img src='" + data[key].url + "' /><input type='hidden' name='exdda_" + snippet_cat + "_schema[0][" + key + "]' value='" + data[key].id + "'><button class='exdda-file-remove' data-id='" + data[key].id + "'>x</button></div>");
                    } else if (key === 'description' || key === 'articleBody') {
                      $('#exdda_' + snippet_cat + '_schema_holder').find('textarea[name="exdda_' + snippet_cat + '_schema[0][' + key + ']"]').val(data[key]);
                    } else {
                      $('#exdda_' + snippet_cat + '_schema_holder').find('input[name="exdda_' + snippet_cat + '_schema[0][' + key + ']"]').val(data[key]);
                    }
                  }

                  break;

                case 'product':
                  for (var _key in data) {
                    if (_key == 'image') {
                      $('#exdda_' + snippet_cat + '_schema_holder #exdda_' + snippet_cat + '_schema_0__' + _key + '_').find('.exdda-preview-imgs').html("<div class='exdda-preview-img'><img src='" + data[_key].url + "' /><input type='hidden' name='exdda_" + snippet_cat + "_schema[0][" + _key + "]' value='" + data[_key].id + "'><button class='exdda-file-remove' data-id='" + data[_key].id + "'>x</button></div>");
                    } else if (_key === 'offers') {
                      for (var sub_key in data[_key][0]) {
                        $('#exdda_' + snippet_cat + '_schema_holder').find('input[name="exdda_' + snippet_cat + '_schema[0][' + sub_key + ']"]').val(data[_key][0][sub_key]);
                      }
                    } else if (_key === 'aggregateRating') {
                      for (var _sub_key in data[_key]) {
                        $('#exdda_' + snippet_cat + '_schema_holder').find('input[name="exdda_' + snippet_cat + '_schema[0][' + _sub_key + ']"]').val(data[_key][_sub_key]);
                      }
                    } else if (_key === 'description') {
                      $('#exdda_' + snippet_cat + '_schema_holder').find('textarea[name="exdda_' + snippet_cat + '_schema[0][' + _key + ']"]').val(data[_key]);
                    } else {
                      $('#exdda_' + snippet_cat + '_schema_holder').find('input[name="exdda_' + snippet_cat + '_schema[0][' + _key + ']"]').val(data[_key]);
                    }
                  }

                  break;

                default:
                  break;
              }
            }
          }
        });
      }

      var post_id = $('#post_ID').val();
      var rich_snippet_cat = $("#exdda-rich_snippet_cat").val();
      var url_string = window.location.href;
      var url = new URL(url_string);
      var c = url.searchParams.get("action"); //auto fill up cat and data in edit screen

      if (rich_snippet_cat && !rich_snippet_cat.length && c && c == 'edit') {
        if ($("body").hasClass("post-type-post")) {
          auto_fill_ajax('post', post_id);
        } else if ($("body").hasClass("post-type-product") || $("body").hasClass("post-type-download")) {
          $('#exdda-rich_snippet_cat').val(['product']);
          $('#exdda-rich_snippet_cat').trigger('change');
          auto_fill_ajax('product', post_id);
        }
      }

      $('#exdda-rich_snippet_cat').on('select2:select', function (e) {
        var snippet_cat = e.params.data.id;
        auto_fill_ajax(snippet_cat, post_id);
      });
    },

    /**
     * Conditional meta field
     * @since 1.0.0
     * @return {mixed} 
     */
    conditionalField: function conditionalField() {
      $(document).on('change', '#exdda_meta input[type=checkbox], #exdda_meta input[type=radio], #exdda_meta select', function () {
        showHideMeta();
      });
      $("#exdda-rich_snippet_cat").on("change", function (e) {
        showHideMeta();
      });
      showHideMeta();

      function showHideMeta() {
        var rt_support_review_schema = $("#exdda-support-dda").is(':checked');
        var rt_support_review = $("#exdda-support-review").is(':checked');

        if (rt_support_review || rt_support_review_schema) {
          $(".exdda-tab-nav.rt-back li:nth-child(1)").show();
          $(".exdda-tab-nav.rt-back li:nth-child(2)").show();
          $(".exdda-tab-nav.rt-back li:nth-child(4)").show();
        } else {
          $(".exdda-tab-nav.rt-back li:nth-child(1)").hide();
          $(".exdda-tab-nav.rt-back li:nth-child(2)").hide();
          $(".exdda-tab-nav.rt-back li:nth-child(4)").hide();
        }

        var rt_support_schema = $("#exdda-support-schema").is(':checked');

        if (rt_support_schema || rt_support_review_schema) {
          $(".exdda-tab-nav.rt-back li:nth-child(3)").show();
        } else {
          $(".exdda-tab-nav.rt-back li:nth-child(3)").hide();
        } // review custom page


        var custom_page = $("#exdda-post-type").val();

        if (custom_page == 'page') {
          $('#exdda_page_id_holder').show(); //schema tab

          $('#page_schema_holder').show();
          $('#rich_snippet_holder').hide();
          $('#rich_snippet_cat_holder').hide();
        } else {
          $('#exdda_page_id_holder').hide(); //schema tab

          $('#page_schema_holder').hide();
          $('#rich_snippet_holder').show();
          $('#rich_snippet_cat_holder').show();
        }
        /* Schema Tab */


        var auto_snippet = $("#exdda-auto_rich_snippet").is(':checked');

        if (auto_snippet && custom_page != 'page') {
          $("#rich_snippet_cat_holder").show();
        } else {
          $("#rich_snippet_cat_holder").hide();
        } // schema custom page


        var schema_custom_page = $("#exdda-schema-post-type").val();

        if (schema_custom_page == 'page') {
          $('#exdda_schma_page_id_holder').show();
        } else {
          $('#exdda_schma_page_id_holder').hide();
        } // schema field group


        var rich_snippet_cat = $("#exdda-rich_snippet_cat").val();
        var rich_snippet_cat_text = $("#exdda-rich_snippet_cat option:selected").text();

        if (rich_snippet_cat_text.indexOf("[Pro]") >= 0) {
          if (!exdda.pro) {
            $('.exdda-pro-alert').show();
          }

          $('.exdda-schema-field').hide();
        } else {
          $('.exdda-schema-field').hide();
          $('#exdda_' + rich_snippet_cat + '_schema_holder').show();
        }

        $('.exdda-schema-field').hide();

        if (rich_snippet_cat) {
          //auto open first snippet
          if (rich_snippet_cat.length == 1) {
            $('#exdda_' + rich_snippet_cat[0] + '_schema_holder').find(".exdda-accordion-body:first").show();
            $('#exdda_' + rich_snippet_cat[0] + '_schema_holder').find(".exdda-accordion-label:first .exdda-accordion-arrow i").removeClass("dashicons-arrow-down-alt2").addClass("dashicons-arrow-up-alt2");
            $('#exdda_' + rich_snippet_cat[0] + '_schema_holder').find(".exdda-accordion-label:first").addClass("active");
          }

          for (var i = 0; i < rich_snippet_cat.length; i++) {
            $('#exdda_' + rich_snippet_cat[i] + '_schema_holder').show();
          }
        }
        /* Review Tab */

        /* Affiliate Shortcode */
        //affiliate tab
        //criteria


        var criteria = $("#exdda-criteria-multi").is(':checked');

        if (criteria) {
          $("#multi_criteria_holder").show();
        } else {
          $("#multi_criteria_holder").hide();
        } //pros


        var pros = $("#enable_pros").is(':checked');

        if (pros) {
          $("#pros_holder").show();
        } else {
          $("#pros_holder").hide();
        } //cons


        var cons = $("#enable_cons").is(':checked');

        if (cons) {
          $("#cons_holder").show();
        } else {
          $("#cons_holder").hide();
        } //schema tab


        var affiliate_custom_snippet = $("#exdda-snippet-custom").val();

        if (affiliate_custom_snippet == 'custom') {
          $('.exdda-snippet-custom').show();
        } else {
          $('.exdda-snippet-custom').hide();
        }
        /* Setting Tab */
        //pros_cons


        var pros_cons = $("#exdda-pros_cons").is(':checked');

        if (pros_cons) {
          $("#pros_cons_limit_holder").show();
        } else {
          $("#pros_cons_limit_holder").hide();
        } //filter


        var filter = $("#exdda-filter").is(':checked');

        if (filter) {
          $("#filter_option_holder").show();
        } else {
          $("#filter_option_holder").hide();
        }
        /* Single: Review */

        /* Single: Affiliate */
        //pros single


        var single_pros = $("#exdda-enable_pros").is(':checked');

        if (single_pros) {
          $("#exdda_pros_holder").show();
        } else {
          $("#exdda_pros_holder").hide();
        } //cons single


        var single_cons = $("#exdda-enable_cons").is(':checked');

        if (single_cons) {
          $("#exdda_cons_holder").show();
        } else {
          $("#exdda_cons_holder").hide();
        }
        /* Settins Schema Tab */


        var schema_cat = $("#exdda_schema_settings-category").val();

        if (schema_cat == 'Restaurant') {
          $('.exdda_schema_settings-servesCuisine, .exdda_schema_settings-menu, .exdda_schema_settings-acceptsReservations').show();
        } else {
          $('.exdda_schema_settings-servesCuisine, .exdda_schema_settings-menu, .exdda_schema_settings-acceptsReservations').hide();
        }
      }
    },

    /**
     * Ajax functions
     * @since 1.0.0
     * @return {mixed} 
     */
    ajaxEvent: function ajaxEvent() {
      // check already defined post type
      $('#exdda-post-type, #exdda-schema-post-type').on('select2:select', function (e) {
        var post_type = e.params.data.id;
        if (post_type == 'page') return;
        $.ajax({
          url: exdda.ajaxurl,
          data: {
            action: 'exdda_check_post_type',
            post_type: post_type
          },
          type: 'POST',
          dataType: "json",
          success: function success(resp) {
            if (!resp.success) {
              $('#exdda-post-type').val("0").select2();
              $('.exdda-post-type').show();
            }
          }
        });
      }); // import others plugin schema data

      $('.exdda-import-schema').on('click', function (e) {
        var $this = $(this);
        var data_id = $(this).data('id');
        $.ajax({
          url: exdda.ajaxurl,
          data: {
            action: 'exdda_data_import',
            data_id: data_id
          },
          type: 'POST',
          dataType: "json",
          beforeSend: function beforeSend() {
            $this.next().css("visibility", "inherit");
          },
          success: function success(resp) {
            $this.next().css("visibility", "hidden");

            if (resp.success) {
              console.log(resp);
              $this.next().next().addClass('success').html('Data has been imported successfully');
            } else {
              $this.next().next().addClass('failed').html('Plugin data is not available or it is not activated');
            }
          }
        });
      });
    },

    /**
           * Meta Field: Repeater
           * @since 1.0.0
           * @return {mixed} 
           */
    metaRepeater: function metaRepeater() {
      function metaRepeater(selector, selector_slug) {
        // repeater shortable
        var repeater_field_id = "#exdda-" + selector;

        if ($(repeater_field_id).length) {
          $(repeater_field_id).sortable();
        } // add new repeater


        $(repeater_field_id + " + a").on('click', function (e) {
          //check pro
          var pro_limit = false;
          var pro_msg = null;
          var field_length = $(repeater_field_id + " label").length;

          if (!exdda.pro) {
            switch (selector) {
              case 'multi-criteria':
                if (field_length >= 3) {
                  pro_limit = true;
                  pro_msg = exdda.criteria_alt_txt;
                }

                break;

              case 'pros':
                if (field_length >= 3) {
                  pro_limit = true;
                  pro_msg = exdda.pros_alt_txt;
                }

                break;

              case 'cons':
                if (field_length >= 3) {
                  pro_limit = true;
                  pro_msg = exdda.cons_alt_txt;
                }

                break;
            }

            if (pro_limit) {
              $('.exdda-pro-alert').show();

              if (pro_msg) {
                $('.exdda-pro-alert p span').html(pro_msg + ' ');
              }

              return false;
            }
          }

          e.preventDefault();
          var field_prefix = '';
          var editReview = $(this).data('type');

          if (editReview == 'edit') {
            field_prefix = 'rt_';
          }

          if ($(this).data('single') && (selector_slug == 'pros' || selector_slug == 'cons')) {
            field_prefix = 'exdda_'; //prefix for affilite single meta
          }

          var theId = selector_slug + '-' + ($(repeater_field_id + " label").length + 1);
          var new_field = "<label for='" + theId + "'><input type='text' id='" + theId + "' name='" + field_prefix + selector_slug + "[]' value=''><i class='dashicons dashicons-move'></i> <i class='remove dashicons dashicons-dismiss'></i></label>";
          $(repeater_field_id).append(new_field);
        }); // remove repeater 

        $(document).on('click', repeater_field_id + " .remove", function (e) {
          e.preventDefault();
          $(this).parent().remove();
        });
      }

      metaRepeater('multi-criteria', 'multi_criteria');
      metaRepeater('pros', 'pros');
      metaRepeater('cons', 'cons');
    },

    /**
     * Meta Field: Image
     * @since 1.0.0
     * @return {mixed} 
     */
    metaImage: function metaImage() {
      //gallery meta field
      $(document).on('click', '.exdda-upload-box', function (e) {
        e.preventDefault();
        var name = $(this).attr('data-name');
        var field_type = $(this).attr('data-field');
        var self = $(this),
            file_frame,
            json; // If an instance of file_frame already exists, then we can open it rather than creating a new instance

        if (undefined !== file_frame) {
          file_frame.open();
          return;
        } // Here, use the wp.media library to define the settings of the media uploader


        file_frame = wp.media.frames.file_frame = wp.media({
          frame: 'post',
          state: 'insert',
          multiple: field_type == 'image' ? false : true
        }); // Setup an event handler for what to do when an image has been selected

        file_frame.on('insert', function () {
          // Read the JSON data returned from the media uploader
          json = file_frame.state().get('selection').first().toJSON(); // First, make sure that we have the URL of an image to display

          if (0 > $.trim(json.url.length)) {
            return;
          }

          var images = file_frame.state().get('selection').toJSON();
          var img_data = "";
          var multiple = field_type == 'image' ? '' : '[]';
          images.forEach(function (element) {
            img_data += "<div class='exdda-preview-img'><img src='" + element.url + "' /><input type='hidden' name='" + name + multiple + "' value='" + element.id + "'><button class='exdda-file-remove' data-id='" + element.id + "'>x</button></div>";
          });

          if (field_type == 'image') {
            self.prev().html(img_data);
          } else {
            self.prev().html(img_data);
          }
        }); // Now display the actual file_frame

        file_frame.open();
      }); //delete image  

      $(document).on('click', '.exdda-file-remove', function (e) {
        e.preventDefault();

        if (confirm(exdda.sure_txt)) {
          if ($(this).parent().parent().children('.exdda-preview-img').length <= 1) {
            $(this).parent().children('img').remove();
            $(this).parent().children('input').val(0);
            $(this).remove();
          } else {
            $(this).parent().remove();
          }
        }
      });
    },

    /**
     * Meta Field: Group
     * @since 1.0.0
     * @return {mixed} 
     */
    metaGroup: function metaGroup() {
      function accordionToggle() {
        $(".exdda-accordion-label").off().on('click', function (e) {
          e.preventDefault();
          $(this).toggleClass('active');

          if ($(this).hasClass("active")) {
            $(this).find(".exdda-accordion-arrow i").removeClass("dashicons-arrow-down-alt2").addClass("dashicons-arrow-up-alt2");
          } else {
            $(this).find(".exdda-accordion-arrow i").removeClass("dashicons-arrow-up-alt2").addClass("dashicons-arrow-down-alt2");
          }

          var panel = $(this).next();

          if (panel.css("display") == "block") {
            panel.slideUp();
          } else {
            panel.slideDown();
          }
        });
      }

      accordionToggle();
      $(document).on("click", ".exdda-group-wrap + a", function (e) {
        //check pro
        var pro_limit = false;
        var pro_msg = null;
        var data_pro = $(this).data('pro');
        var id = $(this).data('id');
        var name = $(this).data('name');

        if (!exdda.pro && data_pro == 'yes') {
          if (id == 'rating_criteria') {
            if ($(this).prev().children().length > 2) {
              $('.exdda-pro-alert').show();

              if (exdda.criteria_rating) {
                $('.exdda-pro-alert p span').html(exdda.criteria_rating + ' ');
              }

              return false;
            }
          } else {
            pro_limit = true;
            pro_msg = exdda.multiple_txt;

            if (pro_limit) {
              $('.exdda-pro-alert').show();

              if (pro_msg) {
                $('.exdda-pro-alert p span').html(pro_msg + ' ');
              }

              return false;
            }
          }
        }

        e.preventDefault(); //fill up input live value to input other wise last fill up not cloing

        $("#" + id + ' input').each(function () {
          $(this).attr('value', $(this).val());
        });
        $("#" + id + ' textarea').each(function () {
          $(this).html($(this).val());
        }); //clone last field

        var clone_copy = $("#" + id + ' > .exdda-accordion-wrap:last-child').clone();
        $("#" + id).append(clone_copy);
        $("#" + id + ' > .exdda-accordion-wrap').each(function (key) {
          var this_string = $(this).html(); //increment name attribute

          var regName = name;
          regName = regName.replaceAll("[", "\\[");
          regName = regName.replaceAll("]", "\\]");
          var myRegexp = new RegExp("".concat(regName, "\\[([0-9]+)"), "g");
          var match = myRegexp.exec(this_string);
          var value;

          if (match != null && match.length > 1) {
            value = this_string.replaceAll(name + '[' + match[1], name + '[' + key);
          } //increment id attribute


          var myRegexpId = new RegExp("".concat(id, "\\_([0-9]+)"), "g");
          var matchID = myRegexpId.exec(value);

          if (matchID != null && matchID.length > 1) {
            value = value.replaceAll(id + '_' + matchID[1], id + '_' + key);
            $(this).html(value);
          } //accordion number  


          $(this).find("> .exdda-accordion-label span.exdda-accordion-counter").html(key + 1);
        });
        accordionToggle();
      }); //remove  

      $(document).on("click", ".exdda-accordion-remove", function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        if ($("#" + id).find(".exdda-accordion-wrap").length < 2) {
          alert(exdda.at_least_txt);
          return;
        }

        if (confirm(exdda.sure_txt)) {
          $(this).closest('.exdda-accordion-wrap').remove();
          $("#" + id).find(".exdda-accordion-wrap").each(function (key) {
            //accordion number 
            $(this).find(".exdda-accordion-label span.exdda-accordion-counter").html(key + 1);
          });
        }
      });
    },

    /**
     * Setting Field: Group
     * @since 1.0.0
     * @return {mixed} 
     */
    settingGroup: function settingGroup() {
      $(document).on("click", ".exdda-group-add a", function (e) {
        //check pro 
        var data_pro = $(this).data('pro');
        var id = $(this).data('id');
        var name = $(this).data('name');

        if (!exdda.pro && data_pro == 'yes') {
          $('.exdda-pro-alert').show();
          return false;
        }

        e.preventDefault(); //fill up input live value to input other wise last fill up not cloing

        $("#" + id + ' input').each(function () {
          $(this).attr('value', $(this).val());
        });
        var clone_copy = $("#" + id + ' > .exdda-setting-group-wrap:last-child').clone();
        $("#" + id).append(clone_copy);
        regenerate_name(id, name);
      });

      function regenerate_name(id, name) {
        $("#" + id + ' > .exdda-setting-group-wrap').each(function (key) {
          var this_string = $(this).html(); //increment name attribute

          var regName = name;
          regName = regName.replaceAll("[", "\\[");
          regName = regName.replaceAll("]", "\\]");
          var myRegexp = new RegExp("".concat(regName, "\\[([0-9]+)"), "g");
          var match = myRegexp.exec(this_string);
          var value;

          if (match != null && match.length > 1) {
            value = this_string.replaceAll(name + '[' + match[1], name + '[' + key);
            $(this).html(value);
          }
        });
      } //remove  


      $(document).on("click", ".exdda-group-remove", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name');
        $("#" + id + ' input').each(function () {
          $(this).attr('value', $(this).val());
        });

        if (confirm(exdda.sure_txt)) {
          $(this).parent().remove();
          regenerate_name(id, name);
        }
      });
    },

    /**
     * Setting Field: Image
     * @since 1.0.0
     * @return {mixed} 
     */
    settingImage: function settingImage() {
      $('.exdda-setting-image-wrap').on('click', '.exdda-add-image', function (e) {
        e.preventDefault();
        var self = $(this),
            target = self.parents('.exdda-setting-image-wrap'),
            file_frame,
            image_data,
            json; // If an instance of file_frame already exists, then we can open it rather than creating a new instance

        if (undefined !== file_frame) {
          file_frame.open();
          return;
        } // Here, use the wp.media library to define the settings of the media uploader


        file_frame = wp.media.frames.file_frame = wp.media({
          frame: 'post',
          state: 'insert',
          multiple: false
        }); // Setup an event handler for what to do when an image has been selected

        file_frame.on('insert', function () {
          // Read the JSON data returned from the media uploader
          json = file_frame.state().get('selection').first().toJSON(); // First, make sure that we have the URL of an image to display

          if (0 > $.trim(json.url.length)) {
            return;
          }

          var imgUrl = typeof json.sizes.medium === "undefined" ? json.url : json.sizes.medium.url;
          target.find('.exdda-setting-image-id').val(json.id);
          target.find('.image-preview-wrapper').html('<img src="' + imgUrl + '" alt="' + json.title + '" />');
        }); // Now display the actual file_frame

        file_frame.open();
      }); // Delete the image when "Remove Image" button clicked

      $('.exdda-setting-image-wrap').on('click', '.exdda-remove-image', function (e) {
        e.preventDefault();
        var self = $(this),
            target = self.parents('.exdda-setting-image-wrap');

        if (confirm(exdda.sure_txt)) {
          target.find('.exdda-setting-image-id').val('');
          target.find('.image-preview-wrapper img').attr('src', target.find('.image-preview-wrapper').data('placeholder'));
        }
      });
    },

    /* ---------------------------------------------
     function initialize
     --------------------------------------------- */
    initialize: function initialize() {
      rtApp.metaTab();
      rtApp.alertBox();
      rtApp.libSupport();
      rtApp.conditionalField();
      rtApp.autoFillSchema();
      rtApp.ajaxEvent();
      rtApp.metaRepeater();
      rtApp.metaImage();
      rtApp.metaGroup();
      rtApp.settingGroup();
      rtApp.settingImage();
    }
  };
  /* ---------------------------------------------
   Document ready function
   --------------------------------------------- */

  $(function () {
    rtApp.initialize();
  });
  $(window).on('load', function () {});
})(jQuery);
/******/ })()
;