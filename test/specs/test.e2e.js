const { expect } = require('@wdio/globals')
const RegisterPage = require('../pageobjects/register.page')
const SecurePage = require('../pageobjects/secure.page')
const loginPage = require('../pageobjects/login.page')

describe('My Login application', () => {

    const regDetails = {
        firstName: 'jack',
        lastName: 'mwas',
        username: 'jackM',
        email: 'jackwdio@gmail.com',
        password: '12345'
    }

    // Test for registration

    it('should register with valid credentials', async () => {
        await RegisterPage.open()
        

        await RegisterPage.register(regDetails);
                
        //Get current url after registration

        const url = await  browser.getUrl();
        console.log("THE CURRENT URL::::::::",url)

        //expected path
        const expectedPath = '/trade'

        await expect(url).toContain(expectedPath)
    })

    // Test for login

    it('should login with valid credentials', async () => {
        await loginPage.open()

        await loginPage.login(regDetails)
        await expect(SecurePage.flashAlert).toBeExisting()
        await expect(SecurePage.flashAlert).toHaveTextContaining(
            'Money Doesn\'T Come Without Care')
    })


})

