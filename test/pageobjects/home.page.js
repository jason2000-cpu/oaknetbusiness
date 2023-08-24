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

    get   accountLink () {
        function accountLink () {
            return document.querySelector('#accountLink');
        }
        return accountLink();
    }
    get aboutLink () {
        return $('#aboutLink');
    }

    get servicesLink () {
        return $('#servicesLink');
    }

    get reportsLink () {
        return $('#reportsLink');
    }

    get contactsLink () {
        return $('#contactsLink');
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
    async viewAboutPage () {
            if (await this.profileModal.isExisting()) {
                await this.profileModalCloseBtn.click();
            }
            await this.accountLink.click();
        //  console.log("THE LINK TEXT HERE:::::::", await this.accountLink);
    }

    async viewServicesPage () {
        if (await this.profileModal.isExisting()) {
            await this.profileModalCloseBtn.click();
        }
        await this.servicesLink.click();
        const expectedPath = '/trade/service.php';
        const url = await browser.getUrl();
        await expect(url).toContain(expectedPath)
    }

    async viewAboutPage () {
        if(await this.profileModal.isExisting()) {
            await this.profileModalCloseBtn.click();
        }
        await this.aboutLink.click();
        const expectedPath = 'trade/about.php';
        const url = await browser.getUrl();
        await expect(url).toContain(expectedPath)
    }

    async viewReportsPage () {
        if(await this.profileModal.isExisting()) {
            await this.profileModalCloseBtn.click();
        }
        await this.reportsLink.click();
        const expectedPath = 'trade/Blog.php';
        const url = await browser.getUrl();
        await expect(url).toContain(expectedPath)
    }

    async viewContactsPage () {
        if(await this.profileModal.isExisting()) {
            await this.profileModalCloseBtn.click();
        }
        await this.contactsLink.click();
        const expectedPath = 'trade/contact.php';
        const url = await browser.getUrl();
        await expect(url).toContain(expectedPath)
    }

    
}

module.exports = new HomePage();
