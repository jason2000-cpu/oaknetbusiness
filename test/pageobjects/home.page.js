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

    get accountLink () {
        console.log("THE LINK TEXT HERE:::::::",  $('#aboutLink'));
        return $('#accountLink');
    }

    get profileModal () {
        return $('#me-profile-modal');
    }

    get profileModalCloseBtn () {
        return $('#closeBtn');
    }
    
    get profileMobileInput () {
        return $('#mobile')
    }

    get profileCountryInput () {
        return $('#country')
    }

    get profileResidenceInput () {
        return $('#residence')
    }
    
    get profileImageInput () {
        return $('#image')
    }

    get profileSubmitBtn () {
        return $('#ProfInfBtn')
    }

    get successMessage () {
        return $('#swal2-html-container')
    }

    async updateProfile (regDetails) {
        const { mobile, country, residence, image } = regDetails;
        await this.profileMobileInput.setValue(mobile);
        await this.profileCountryInput.setValue(country);
        await this.profileResidenceInput.setValue(residence);
        (await this.profileImageInput).setValue(image);
        await this.profileSubmitBtn.click();

        console.log("THE PROFILE DETAILS WERE FILLED SUCCESSFULLY")

    }
    async viewAccount () {
            if (await this.profileModal.isExisting()) {
                await this.profileModalCloseBtn.click();
            }
            await this.accountLink.click();
        //  console.log("THE LINK TEXT HERE:::::::", await this.accountLink);
    }

    
    
}

module.exports = new HomePage();
