const { $ } = require('@wdio/globals')
const Page = require('./page');

/**
 * sub page containing specific selectors and methods for a specific page
 */
class RegisterPage extends Page {
    /**
     * define selectors using getter methods
     */
    get inputFirstName () {
        return $('#Fname');
    }
    get inputLastName () {
        return $('#Lname');
    }
    get inputEmail () {
        return $('#email');
    }

    get inputUsername () {
        return $('#username');
    }

    get inputPassword () {
        return $('#password');
    }

    get btnSubmit () {
        return $('button[type="submit"]');
    }

    /**
     * a method to encapsule automation code to interact with the page
     * e.g. to login using username and password
     */
    async register (regDetails) {
        const { firstname, lastname, username, email, password } = regDetails;
        await this.inputUsername.setValue(username);
        await this.inputPassword.setValue(password);
        await this.inputEmail.setValue(email);
        await this.inputFirstName.setValue(firstname);
        await this.inputLastName.setValue(lastname);
        await this.btnSubmit.click();
    }

    async registerWithInvalidDetails (regDetails) {
        const { firstname, lastname, username, password } = regDetails;
        const email = 'james@gmail.com';
        await this.inputUsername.setValue(username);
        await this.inputPassword.setValue(password);
        await this.inputEmail.setValue(email);
        await this.inputFirstName.setValue(firstname);
        await this.inputLastName.setValue(lastname);
        await this.btnSubmit.click();
    }

    /**
     * overwrite specific options to adapt it to page object
     */
    open () {
        return super.open('/auth/registration.php');
    }
}

module.exports = new RegisterPage();
