const { expect } = require('@wdio/globals')
const RegisterPage = require('../pageobjects/register.page')
const HomePage = require('../pageobjects/secure.page')
const loginPage = require('../pageobjects/login.page')
const homePage = require('../pageobjects/home.page')

describe('My Login application', () => {

    const regDetails = {
        firstName: 'jack',
        lastName: 'mwas',
        username: 'jackM',
        email: 'jackwdio@gmail.com',
        password: '12345'
    }

    // Test for registration

    // it('should register with valid credentials', async () => {
    //     await RegisterPage.open()
        

    //     await RegisterPage.register(regDetails);
                
    //     //Get current url after registration

    //     const url = await  browser.getUrl();
    //     console.log("THE CURRENT URL::::::::",url)

    //     //expected path
    //     const expectedPath = '/trade'

    //     await expect(url).toContain(expectedPath)
    // })

    // Test for login

    it('should login with valid credentials', async () => {
        await loginPage.open()

        await loginPage.login(regDetails)
        await expect(HomePage.bannerText).toBeExisting()
        await expect(HomePage.bannerText).toHaveTextContaining(
            'Money Doesn\'T Come Without Care')
    })

    // // Test for logout
    // it('should logout', async () => {
    //     await HomePage.logout()
    //     await expect(HomePage.bannerText).not.toBeExisting()
    // })

    //test for account view

    // it('should view account', async () => {
    //     await loginPage.open()
    //     await loginPage.login(regDetails)
    //     // await homePage.viewAccount()

    //     // await homePage.accountLink.waitForDisplayed({ timeout: 10000 })
    //     await homePage.accountLink.click()
        
    //     // check if the url contains the expected path after clicking my-account link on the home page
    //     const url = await browser.getUrl();
    //     const expectedPath = 'trade/about.php'
    //     await expect(url).toContain(expectedPath)
    // })


})

