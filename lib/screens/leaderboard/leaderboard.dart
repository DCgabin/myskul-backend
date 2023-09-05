import 'package:flutter/material.dart';

class leaderboard extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: CustomScrollView(
        slivers: [
          SliverAppBar(
            pinned: true,
            leading: BackButton(),
            backgroundColor: Color.fromRGBO(34, 152, 127, 1),
            expandedHeight: 80,
            title: Padding(
              padding: EdgeInsets.only(top: 32.0),
              child: Text("Leaderboard"),
            ),
            centerTitle: true,
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.only(
                bottomLeft: Radius.circular(35),
                bottomRight: Radius.circular(35),
              ),
            ),
          ),
          // Add a SliverToBoxAdapter to display your warning message
          SliverToBoxAdapter(
            child: Center(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,

                children: [
                  SizedBox(height: 300.0),
                  Icon(
                    Icons.warning,
                    size: 64.0,
                    color: Colors.yellow,
                  ),
                  SizedBox(height: 15.0),
                  Text(
                    'Functionality under development',
                    style: TextStyle(
                      fontSize: 16.0,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }
}
