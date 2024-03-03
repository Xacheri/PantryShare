class TestDataClass {
	static getLocalPantryRequests() {
		return [
			{
				order: {
					OrderID: 1,
					UserID: 1,
					FamilySize: 3,
					Status: "Open",
					PickupLocation: "Krogers on S. Glenstone",
					RequestorNote:
						"Email me at louis@gmail.com to arrange a meetup time.",
					orderItems: [
						{
							FoodID: 1,
							FoodName: "Apples",
							CategoryID: 1,
							CategoryName: "Fruits",
						},
						{
							FoodID: 8,
							FoodName: "Onions",
							CategoryID: 2,
							CategoryName: "Vegetables",
						},
						{
							FoodID: 10,
							FoodName: "Potatoes",
							CategoryID: 2,
							CategoryName: "Vegetables",
						},
						{
							FoodID: 21,
							FoodName: "Milk",
							CategoryID: 5,
							CategoryName: "Dairy",
						},
						{
							FoodID: 16,
							FoodName: "Fish",
							CategoryID: 4,
							CategoryName: "Proteins",
						},
					],
				},
				user: {
					UserID: 1,
					UserName: "llathrop",
					EmailAddress: "ll0128774@otc.edu",
					FirstName: "Louis",
					LastName: "Lathrop",
					Location: 65804,
				},
			},
			{
				order: {
					OrderID: 2,
					UserID: 2,
					FamilySize: 4,
					Status: "Open",
					PickupLocation: "SW Springfield",
					RequestorNote:
						"Leave it at my doorstep at 124 s Barcliff Ave. Thanks!",
					orderItems: [
						{
							FoodID: 5,
							FoodName: "Bananas",
							CategoryID: 1,
							CategoryName: "Fruits",
						},
						{
							FoodID: 12,
							FoodName: "Carrots",
							CategoryID: 2,
							CategoryName: "Vegetables",
						},
						{
							FoodID: 14,
							FoodName: "Broccoli",
							CategoryID: 2,
							CategoryName: "Vegetables",
						},
						{
							FoodID: 24,
							FoodName: "Eggs",
							CategoryID: 5,
							CategoryName: "Dairy",
						},
						{
							FoodID: 18,
							FoodName: "Chicken",
							CategoryID: 4,
							CategoryName: "Proteins",
						},
					],
				},
				user: {
					UserID: 2,
					UserName: "jdoe",
					EmailAddress: "jdoe@example.com",
					FirstName: "John",
					LastName: "Doe",
					Location: 65807,
				},
			},
			{
				order: {
					OrderID: 3,
					UserID: 3,
					FamilySize: 2,
					Status: "Open",
					PickupLocation: "Target on E. Independence St",
					RequestorNote:
						"Call me at 417-555-5555 to arrange a meetup time. Thanks!",
					orderItems: [
						{
							FoodID: 3,
							FoodName: "Oranges",
							CategoryID: 1,
							CategoryName: "Fruits",
						},
						{
							FoodID: 9,
							FoodName: "Tomatoes",
							CategoryID: 2,
							CategoryName: "Vegetables",
						},
						{
							FoodID: 11,
							FoodName: "Spinach",
							CategoryID: 2,
							CategoryName: "Vegetables",
						},
						{
							FoodID: 22,
							FoodName: "Cheese",
							CategoryID: 5,
							CategoryName: "Dairy",
						},
						{
							FoodID: 20,
							FoodName: "Beef",
							CategoryID: 4,
							CategoryName: "Proteins",
						},
					],
				},
				user: {
					UserID: 3,
					UserName: "asmith",
					EmailAddress: "asmith@example.com",
					FirstName: "Alice",
					LastName: "Smith",
					Location: 65802,
				},
			},
		];
	}
	static getRequestAndServiceHistoryForUser() {
		return {
			service_orders: [
				{
					order: {
						OrderID: 3,
						UserID: 3,
						FamilySize: 2,
						Status: "Completed",
						orderItems: [
							{
								FoodID: 3,
								FoodName: "Oranges",
								CategoryID: 1,
								CategoryName: "Fruits",
							},
							{
								FoodID: 9,
								FoodName: "Tomatoes",
								CategoryID: 2,
								CategoryName: "Vegetables",
							},
							{
								FoodID: 11,
								FoodName: "Spinach",
								CategoryID: 2,
								CategoryName: "Vegetables",
							},
							{
								FoodID: 22,
								FoodName: "Cheese",
								CategoryID: 5,
								CategoryName: "Dairy",
							},
							{
								FoodID: 20,
								FoodName: "Beef",
								CategoryID: 4,
								CategoryName: "Proteins",
							},
						],
					},
				},
				{
					order: {
						OrderID: 4,
						UserID: 4,
						FamilySize: 5,
						Status: "In-Progress",
						orderItems: [
							{
								FoodID: 6,
								FoodName: "Grapes",
								CategoryID: 1,
								CategoryName: "Fruits",
							},
							{
								FoodID: 13,
								FoodName: "Bell Peppers",
								CategoryID: 2,
								CategoryName: "Vegetables",
							},
							{
								FoodID: 15,
								FoodName: "Cabbage",
								CategoryID: 2,
								CategoryName: "Vegetables",
							},
							{
								FoodID: 23,
								FoodName: "Yogurt",
								CategoryID: 5,
								CategoryName: "Dairy",
							},
							{
								FoodID: 17,
								FoodName: "Turkey",
								CategoryID: 4,
								CategoryName: "Proteins",
							},
						],
					},
				},
			],
			request_orders: [
				{
					order: {
						OrderID: 2,
						UserID: 2,
						FamilySize: 4,
						Status: "Open",
						PickupLocation: "SW Springfield",
						RequestorNote:
							"Leave it at my doorstep at 124 s Barcliff Ave. Thanks!",
						orderItems: [
							{
								FoodID: 5,
								FoodName: "Bananas",
								CategoryID: 1,
								CategoryName: "Fruits",
							},
							{
								FoodID: 12,
								FoodName: "Carrots",
								CategoryID: 2,
								CategoryName: "Vegetables",
							},
							{
								FoodID: 14,
								FoodName: "Broccoli",
								CategoryID: 2,
								CategoryName: "Vegetables",
							},
							{
								FoodID: 24,
								FoodName: "Eggs",
								CategoryID: 5,
								CategoryName: "Dairy",
							},
							{
								FoodID: 18,
								FoodName: "Chicken",
								CategoryID: 4,
								CategoryName: "Proteins",
							},
						],
					},
				},
                {
                    order: {
                        OrderID: 5,
                        UserID: 5,
                        FamilySize: 4,
                        Status: "Open",
                        PickupLocation: "Walmart Supercenter on E. Kearney St",
                        orderItems: [
                            {
                                FoodID: 4,
                                FoodName: "Grapes",
                                CategoryID: 1,
                                CategoryName: "Fruits",
                            },
                            {
                                FoodID: 7,
                                FoodName: "Bell Peppers",
                                CategoryID: 2,
                                CategoryName: "Vegetables",
                            },
                            {
                                FoodID: 13,
                                FoodName: "Cauliflower",
                                CategoryID: 2,
                                CategoryName: "Vegetables",
                            },
                            {
                                FoodID: 19,
                                FoodName: "Milk",
                                CategoryID: 5,
                                CategoryName: "Dairy",
                            },
                            {
                                FoodID: 25,
                                FoodName: "Salmon",
                                CategoryID: 4,
                                CategoryName: "Proteins",
                            },
                        ],
                    },
                },
			],
		};
	}
	static getOrderStatus()
    {
        return {order: {
            OrderID: 1,
            UserID: 1,
            FamilySize: 3,
            Status: "Open",
            Location: 65804,
            PickupLocation: "Krogers on S. Glenstone"
        }};
    }  
	static getUserInfo()
	{
		return {user:{
			userID: 1,
			username: 'llathrop',
            firstName: 'Louis',
            lastName: 'Lathrop',
            email: 'louis@example.com',
			location: 65804
		}};

	}
	
}

export default TestDataClass;
