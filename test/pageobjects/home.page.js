const { $ } = require('@wdio/globals')
const Page = require('./page');

/**
 * sub page containing specific selectors and methods for a specific page
 */
class HomePage extends Page {
    /**
     * define selectors using getter methods
     */
    get bannerText () {
        return $('#banner-header');
    }
    get closeBtn () {
        return $('button[type="button"]');
    }

    get accountLink () {
        console.log("THE LINK TEXT HERE:::::::",  $('#aboutLink'));
        return $('#aboutLink');
    }


    async viewAccount () {
        setTimeout(async () => {
            await this.accountLink.click();
        }, 100000)
        //  console.log("THE LINK TEXT HERE:::::::", await this.accountLink);
    }

    
    
}

module.exports = new HomePage();
