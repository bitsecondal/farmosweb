{ "rules_reset_grass_counter_variable" : {
    "LABEL" : "reset grass counter variable",
    "PLUGIN" : "reaction rule",
    "OWNER" : "rules",
    "TAGS" : [ "counter", "grass", "reset", "variable" ],
    "REQUIRES" : [ "rules", "log" ],
    "ON" : { "log_update" : [] },
    "IF" : [
      { "AND" : [
          { "data_is" : { "data" : [ "log:name" ], "value" : "cut grass" } },
          { "data_is" : { "data" : [ "log:done" ], "value" : "1" } },
          { "data_is" : { "data" : [ "log-unchanged:done" ], "value" : "0" } }
        ]
      }
    ],
    "DO" : [
      { "entity_fetch" : {
          "USING" : { "type" : "node", "id" : "2825" },
          "PROVIDE" : { "entity_fetched" : { "node_variable" : "Node Variable" } }
        }
      },
      { "data_set" : { "data" : [ "node-variable:title" ], "value" : "0" } },
      { "entity_save" : { "data" : [ "node-variable" ] } },
      { "drupal_message" : { "message" : "Grass counter has been reset.", "repeat" : "0" } }
    ]
  }
}

