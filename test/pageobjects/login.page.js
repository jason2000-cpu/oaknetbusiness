const { $ } = require('@wdio/globals')
const Page = require('./page');

/**
 * sub page containing specific selectors and methods for a specific page
 */
class LoginPage extends Page {
    /**
     * define selectors using getter methods
     */
    get inputEmail () {
        return $('#email');
    }

    get inputPassword () {
        return $('#password');
    }

    get btnSubmit () {
        return $('button[type="submit"]');
    }

    get errText () {
        return $$('.text-danger')
    }

    /**
     * a method to encapsule automation code to interact with the page
     * e.g. to login using username and password
     */
    async login (regDetails) {
        const { email, password } = regDetails;
        await this.inputEmail.setValue(email);
        await this.inputPassword.setValue(password);
        await this.btnSubmit.click();
    }

    async loginWithInvalidDetails () {
        // const { email, password } = regDetails;
        const email = 'jacktone@gmail.com';
        const password = '12345';
        await this.inputEmail.setValue(email);
        await this.inputPassword.setValue(password);
        await this.btnSubmit.click();

        // const getErrText = await this.errText[0].getText();
        // expect(getErrText.trim()).not.toBe('');
        await this.errText[0].isExisting();
    }

    /**
     * overwrite specific options to adapt it to page object
     */
    open () {
        return super.open('');
    }
}

module.exports = new LoginPage();
