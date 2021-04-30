var input = document.querySelector("#phone");
             window.intlTelInput(input, {
              // allowDropdown: false,
               autoHideDialCode: true,
              // autoPlaceholder: "off",
               dropdownContainer: document.body,
              // excludeCountries: ["us"],
              // formatOnDisplay: false,
              // geoIpLookup: function(callback) {
              //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
              //     var countryCode = (resp && resp.country) ? resp.country : "";
              //     callback(countryCode);
              //     console.log(countryCode);
              //   });
              // },
              hiddenInput: "phone",
              initialCountry: "ve",
              // localizedCountries: { 'de': 'Deutschland' },
              // nationalMode: true,
              // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
               placeholderNumberType: "MOBILE",
              // preferredCountries: ['cn', 'jp'],
              separateDialCode: true,
              utilsScript: "build/js/utils.js",
});