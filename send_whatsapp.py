from yowsup.layers import YowLayerEvent
from yowsup.layers.auth import YowAuthenticationProtocolLayer
from yowsup.layers.protocol_messages.protocolentities import TextMessageProtocolEntity
from yowsup.stacks import YowStackBuilder
from yowsup.common import YowConstants
from yowsup.layers import YowLayerEvent

credentials = ("YOUR_PHONE_NUMBER", "YOUR_WHATSAPP_PASSWORD")  # Your phone number and password

stack_builder = YowStackBuilder()

stack = stack_builder.pushDefaultLayers(True).build()

stack.setCredentials(credentials)

stack.broadcastEvent(YowLayerEvent(YowAuthenticationProtocolLayer.EVENT_START))

with open('whatsapp_message.txt', 'r') as file:
    message = file.read()
    stack.broadcastEvent(YowLayerEvent(YowConstants.EVENT_SEND_MESSAGE, TextMessageProtocolEntity(message, to="RECIPIENT_PHONE_NUMBER")))

stack.loop()
