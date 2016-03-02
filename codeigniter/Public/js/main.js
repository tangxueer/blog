/*    //分类标签系统()
    var states = new Bloodhound({
      datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.word); },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      limit: 4,
      local: [
        { word: "Alabama" },
        { word: "Alaska" },
        { word: "Arizona" },
        { word: "Arkansas" },
        { word: "California" },
        { word: "Colorado" }
      ]
    });

    states.initialize();

    $('input.tagsinput').tagsinput();

    $('input.tagsinput-typeahead').tagsinput('input').typeahead(null, {
      name: 'states',
      displayKey: 'word',
      source: states.ttAdapter()
    });

    $('input.typeahead-only').typeahead(null, {
      name: 'states',
      displayKey: 'word',
      source: states.ttAdapter()
    });
*/


//悬浮气泡
  $(function () {
    $('[data-toggle=tooltip]').tooltip();
  });
