const { expect } = require('@wdio/globals')
const fs = require('fs');
const RegisterPage = require('../pageobjects/register.page')
// const HomePage = require('../pageobjects/secure.page')
const loginPage = require('../pageobjects/login.page')
const HomePage = require('../pageobjects/home.page')




const imagePath = 'C:/xampp/htdocs/trade/assets/images/faq.png'
const imageBase64 = fs.readFileSync(imagePath, { encoding: 'base64' });

const regDetails = {
    firstname: 'jack',
    lastname: 'mwas',
    username: 'jackM',
    email: 'james@gmail.com',
    password: '12345',
    country: 'Kenya',
    mobile: '0712345678',
    residence: 'Nairobi',
    image: imageBase64
}




// describe('My Login application', () => {

//     // Test for registration

//     it('should register with valid credentials', async () => {
//         await RegisterPage.open()
        

//         await RegisterPage.register(regDetails);
                
//         //Get current url after registration

//         const url = await  browser.getUrl();
//         console.log("THE CURRENT URL::::::::",url)

//         //expected path
//         const expectedPath = '/trade'

//         await expect(url).toContain(expectedPath)
//     })

//     // Test for login

//     it('should login with valid credentials', async () => {
//         await loginPage.open()

//         await loginPage.login(regDetails)

//         // await HomePage.updateProfile(regDetails); 


//         if (!await HomePage.bannerText.isExisting()) {
//             // await HomePage.updateProfile(regDetails); 
//             await HomePage.profileModalCloseBtn.click();
//         }
//         await expect(HomePage.bannerText).toHaveTextContaining(
//             'Money Doesn\'T Come Without Care')
        
//     })

//     // Test for logout
//     it('should logout', async () => {
//         await loginPage.open();
//         await loginPage.login(regDetails);
//         await HomePage.logout()
//     })




// })


// describe('Site navigation', () => {

//     // Test for about page navigation

//     it('should navigate to the about page', async () => {
//         await loginPage.open()
//         await loginPage.login(regDetails)
//         await HomePage.viewAboutPage()
//     })

//     // Test for services page navigation
//     it('should navigate to the services page', async () => {
//         await loginPage.open()
//         await loginPage.login(regDetails)
//         await HomePage.viewServicesPage()
//     })

//     // Test for reports page navigation
//     it('should navigate to the reports page', async () => {
//         await loginPage.open()
//         await loginPage.login(regDetails)
//         await HomePage.viewReportsPage()
//     })

//     // Test for contacts page navigation
//     it('should navigate to the contacts page', async () => {
//         await loginPage.open()
//         await loginPage.login(regDetails)
//         await HomePage.viewContactsPage()
//     })

//     // Test for account page navigation
//     it('should navigate to the account page', async () => {
//         await loginPage.open()
//         await loginPage.login(regDetails)
//         await HomePage.viewAccountPage()
//     })
// })

describe('Site actions', () => {
    
    // Test for update profile
    it('should update profile', async () => {
        await loginPage.open()
        await loginPage.login(regDetails)
        await HomePage.viewAccountPage();
        await HomePage.updateProfile(regDetails)
    })

    // Test for add  funds
    it('should add funds', async () => {
        await loginPage.open()
        await loginPage.login(regDetails)
        await HomePage.viewAccountPage();
        await HomePage.addFunds(1000)
    })
})

