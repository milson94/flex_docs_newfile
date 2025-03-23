/* ========================================================= */
/*  File: public/js/cv.js */
/*  Laravel Public JS File */
/* ========================================================= */

window.onload = function() {
    const leftColumn = document.querySelector('.two-column-row td:first-child');
    const rightColumn = document.querySelector('.two-column-row td:last-child');
    const pageHeight = 842; // Height of an A4 page in pixels (adjust if needed)
    const lineHeight = 14;   // Approximate line height in pixels (adjust!)
    const targetLines = 51;    // Target number of lines in the left column
    const maxLeftColumnHeight = lineHeight * targetLines; //max height for left col

    if (leftColumn) {
        if (leftColumn.offsetHeight > maxLeftColumnHeight) {
            // Left column is too long, move content to the right column or next page
            console.log("Left column is too long!");

           //Simple approach: Force the right column to start on a new page.
           rightColumn.style.pageBreakBefore = "always";  // Forces right column to the next page.

           //More sophisticated approach: Move overflowing content. Requires more coding
            //This involves analyzing the elements in the left column and moving
            //the overflowing elements to the right column or creating a new page.

            //WARNING: The JavaScript approach can be complex and requires careful
            //coding and testing. It might not work perfectly in all PDF rendering
            //engines.
        }
    }

    //Handle multiple pages: If any element's top offset is greater than the page height
    //then apply page break before.  Do after any changes to right column.
    const allElements = document.querySelectorAll("*");
    allElements.forEach(el => {
        if(el.offsetTop > pageHeight){
            el.style.pageBreakBefore = "always";
        }
    })
};