const { expect } = require('@wdio/globals')
const fs = require('fs');
const RegisterPage = require('../pageobjects/register.page')
// const HomePage = require('../pageobjects/secure.page')
const loginPage = require('../pageobjects/login.page')
const HomePage = require('../pageobjects/home.page')

describe('My Login application', () => {


    const imagePath = 'C:/xampp/htdocs/trade/assets/images/faq.png'
    const imageBase64 = fs.readFileSync(imagePath, { encoding: 'base64' });

    const regDetails = {
        firstName: 'jack',
        lastName: 'mwas',
        username: 'jackM',
        email: 'jackwdio@gmail.com',
        password: '12345',
        country: 'Kenya',
        mobile: '0712345678',
        residence: 'Nairobi',
        image: imageBase64
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

    // it('should login with valid credentials', async () => {
    //     await loginPage.open()

    //     await loginPage.login(regDetails)

    //     // await HomePage.updateProfile(regDetails); 

    //     // const expectedPath = '/trade';
    //     // const url = await browser.getUrl();
    //     // await expect(url).toContain(expectedPath)



    //     if (!await HomePage.bannerText.isExisting()) {
    //         // await HomePage.updateProfile(regDetails); 
    //         await HomePage.profileModalCloseBtn.click();
    //     }
    //     await expect(HomePage.bannerText).toHaveTextContaining(
    //         'Money Doesn\'T Come Without Care')
        
    // })

    // // Test for logout
    // it('should logout', async () => {
    //     await HomePage.logout()
    //     await expect(HomePage.bannerText).not.toBeExisting()
    // })

    //test for account view

    it('should view account', async () => {
        await loginPage.open()
        await loginPage.login(regDetails)

        await HomePage.viewAccount()
        
        // check if the url contains the expected path after clicking my-account link on the home page
        const url = await browser.getUrl();
        const expectedPath = 'trade/my-account.php'
        await expect(url).toContain(expectedPath)
    })


})

