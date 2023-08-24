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

    get logoutNav () {
        return $('#logoutNav');
    }

    get logoutLink () {
        return $('#logout');
    }

    get accountLink () {
        return $('#accountLink');
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

    get pagesLink () {
        return $('#pages');
    }

    get profileModal () {
        return $('#me-profile-modal');
    }

    get profileModalCloseBtn () {
        return $('#closeBtn');
    }

    get profilEmailInput () {
        return $('#email');
    }

    get profilePassInput () {
        return $('#password');
    }

    get profileFnameInput () {
        return $('#firstname');
    }
    get profileLnameInput () {
        return $('#lastname');
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
        const { firstname,password, lastname, email, mobile, country, residence, image } = regDetails;

        const editProfileBtn = await $('#profEditBtn');
        // await editProfileBtn.scrollIntoView();
        browser.scroll(0, 100)
        console.log("THE EDIT PROFILE BUTTONS ARE::::::::", editProfileBtn.getText());
        await editProfileBtn.click();
        await this.profileFnameInput.setValue(firstname);
        await this.profileLnameInput.setValue(lastname);
        await this.profilEmailInput.setValue(email);
        await this.profilePassInput.setValue(password);
        await this.profileMobileInput.setValue(mobile);
        await this.profileCountryInput.setValue(country);
        await this.profileResidenceInput.setValue(residence);
        browser.execute((el) => el.click(), await this.profileImageInput);
        await browser.pause(8000);
        await this.profileSubmitBtn.click();

        console.log("THE PROFILE DETAILS WERE FILLED SUCCESSFULLY")

    }

    async logout () {
        if (await this.profileModal.isExisting()) {
            await this.profileModalCloseBtn.click();
        }
        await this.logoutNav.moveTo();
        await this.logoutLink.waitForDisplayed();
        await this.logoutLink.click();
        const expectedPath = '/trade';
        const url = await browser.getUrl();
        await expect(url).toContain(expectedPath)
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
    
    async viewAccountPage () {
        if(await this.profileModal.isExisting()) {
            await this.profileModalCloseBtn.click();
        }
        // hover over the element
        await this.pagesLink.moveTo()

        //wait for the element to be visible
        await this.accountLink.waitForDisplayed()

        // click on the element
        await this.accountLink.click()

        const expectedPath = 'trade/my-account.php';
        const url = await browser.getUrl();
        await expect(url).toContain(expectedPath)

    }
}

module.exports = new HomePage();
