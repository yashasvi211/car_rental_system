# Overview
Our car rental system is a multi-featured website done using PHP, CSS, and Javascript. This system could support a car rental agency with a reliable, simple, and most importantly easy to use website. The system is divided mainly into two different modes, one for the normal customer, and another customized for a single admin. It starts with a simple login page for registered users and admins, or a sign up page for new users.

## Customer's Actions
A customer can do the following actions:
* See all cars available in his country (to see cars in other country the customer must change his country).
* Reserve a car for a specific period and wait the admin to approve the reservation.
* Pay for the reservation if the admin has approved it.
* Search for any car by any of it's attributes.

## Admin's Actions
The admin can do the following actions:
* Add/modify or delete any car or change it's status for a specific period.
* Approve or deny any reservation.
* Add offices possessing the cars.
* Search for any customer by any of his attributes.
* Search for any car by any of it's attributes.
</br>

The systmer informes the admin the following:

* Monitor all reservations for a speciifc period (`pickup date` -> `return date`).
* Monitor all reservations done by a specific customer.
* Monitor all reservations of a specific car for a specific period (`pickup date` -> `return date`).
* Get a report of daily payments for a specific period.
* Check all statuses of all cars on a specific day.
* See all reservations done on a specific day (`Entry date`).


## ER-Model

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214310606-987f06bd-9e62-4d81-80f5-f6ab6e5a18f1.jpg" width="700" height="400" title="hover text">
  <img src="https://user-images.githubusercontent.com/104737465/214311475-1ba4c8b6-d72d-41ec-8ad0-0d85cc190e3d.jpg" width="700" height="400" title="hover text">
</p>

## Common Web Pages
**1- Login Page**

The customer must enter a registered email and its correct password. Else, an alert is shown.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214607140-78fd704e-356a-40e9-a360-01094290a304.png" width="700" height="400" title="hover text">
</p>

**2- Sign-up Page**

Verification on customers' information is applied where License ID, National ID, and Emails must be unique. Also each field must abide by its correct format.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214607973-764f0ac0-0fda-4c65-9c7d-5b8cd8d16761.png" width="700" height="400" title="hover text">
</p>

## User Web Pages
**1- Welcome user Page**

This page appears when the customer signs in, showing all available cars in the customer’s country.
If the customer wants to reserve a car in another country he must change his country from Account > Manage your Account.
Pressing the `Rent Now` button redirects to the bottom of the page where the available cars exist.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214619903-4599109b-2202-4b0d-8be5-df2d14137b21.png" width="700" height="300" title="hover text">
</p>

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214620118-1abedf58-f314-47c4-810a-4c1087f966d4.png" width="750" height="450" title="hover text">
</p>

**2- Rent a Car**

This page is shown for each car with its own image and specifications.
At the bottom, there are two buttons: 'Reserve' and ‘Pay’ are enabled or disabled according to the reservations of this car and the response of the admin.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214620540-236e1a32-8722-441e-a596-55dd9abaa513.png" width="750" height="450" title="hover text">
</p>

**3- Checkout**
This page shows the reservation information to the customer just before the payment is done.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214620724-9b7e0f9e-2669-4d6d-a32d-4cdfae4f3d40.png" width="750" height="450" title="hover text">
</p>

## Admin Web Pages
**1- Welcome Admin Page**
This page appears when the admin signs in, all available cars in the customer’s country. Various buttons are shown giving authority to the admin to show, edit, delete or add cars, offices and reservations.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214620900-ddd08133-4c23-4c04-8cda-31e96f4e5483.png" width="750" height="450" title="hover text">
</p>

**2- Edit an Office**

This page allows the admin to edit any office.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214621037-1b66cdfe-7a57-400e-8b98-6fb7af05b4a4.png" width="750" height="450" title="hover text">
</p>

**3- Add an Office**

This page allows an admin to add a new office.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214621203-dcb621ca-bf35-460e-a265-889506c1e8a9.png" width="750" height="450" title="hover text">
</p>

**4- Edit Car**

This page allows the admin to edit any specifications of a car and it allows changing the status of a car for a specific period.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214621357-223bcff2-bd6d-4f66-a580-a44e93797ca0.png" width="750" height="450" title="hover text">
</p>

**5- Add Car**

This page allows the admin to add a new car.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214621514-8c16a44b-097e-4e8f-b543-de4b18fca82a.png" width="750" height="450" title="hover text">
</p>

**6- Show the Payments**

Enter the desired period.

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214621713-841c79ad-e295-4cea-ad65-2085c6860aba.png" width="750" height="450" title="hover text">
</p>

Inserted the period from 01-02-2022 to 28-02-2022

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214621841-f9d23afd-3a90-4568-af20-75c67e2c8993.png" width="750" height="450" title="hover text">
</p>

**7- Reservations on a specific day**

This page allows the admin to get all reservations made in a certain day

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214622074-dc5af63e-1ced-4e7b-919b-3394277cca8a.png" width="750" height="450" title="hover text">
</p>

**8- Cars pending to be approved or rejected by the admin**

<p align="center">
  <img src="https://user-images.githubusercontent.com/104737465/214623517-ef8469be-7997-4089-afed-a86cdd7bb4fe.png" width="750" height="450" title="hover text">
</p>

