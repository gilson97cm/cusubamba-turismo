<!-- READ MORE -->
$(document).ready(function() {

    $('td.expandDiv').expander({
        slicePoint: 125, //It is the number of characters at which the contents will be sliced into two parts.
        widow: 2,
        expandSpeed: 0, // It is the time in second to show and hide the content.
        //userCollapseText: '' // Specify your desired word default is Less.
    });
    $('p.expandDiv').expander({
        slicePoint: 125, //It is the number of characters at which the contents will be sliced into two parts.
        widow: 2,
        expandSpeed: 0, // It is the time in second to show and hide the content.
        //userCollapseText: '' // Specify your desired word default is Less.
    });

    //$('div.expandDiv').expander();
});
